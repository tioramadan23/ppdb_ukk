<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PendaftaranAdminController extends Controller
{
    // ✅ 1. Halaman utama admin
    public function index()
    {
        return view('dashboard.admin'); 
    }

    // ✅ 2. API: Ambil data untuk tabel
    public function getData(Request $request)
    {
        // Memanggil relasi sesuai yang ada di Model kamu: user, orangTua, dokumens, pembayaran
        $query = Pendaftaran::with(['user', 'orangTua', 'dokumens', 'pembayaran']);
        
        // Filter Pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
            });
        }
        
        // Filter Status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status_pendaftaran', $request->status);
        }
        
        $perPage = $request->per_page ?? 10;
        $pendaftarans = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        $data = $pendaftarans->map(function($p) {
            return [
                'id' => $p->id,
                'no' => $p->no_pendaftaran,
                'nama' => $p->nama_lengkap,
                'nisn' => $p->nisn ?? '-',
                'jurusan' => $p->jurusan ?? '-',
                'sekolah' => $p->asal_sekolah ?? '-',
                'tanggal' => $p->created_at ? $p->created_at->format('d/m/Y') : '-',
                'status' => $p->status_pendaftaran, // draft, submit, diverifikasi
                'hp' => $p->no_hp ?? '-',
            ];
        });
        
        // Hitung Statistik
        $statsRaw = Pendaftaran::select('status_pendaftaran', DB::raw('count(*) as total'))
            ->groupBy('status_pendaftaran')
            ->get()
            ->pluck('total', 'status_pendaftaran');

        return response()->json([
            'data' => $data,
            'pagination' => [
                'current_page' => $pendaftarans->currentPage(),
                'last_page' => $pendaftarans->lastPage(),
                'total' => $pendaftarans->total(),
            ],
            'stats' => [
                'total' => $pendaftarans->total(),
                'draft' => $statsRaw['draft'] ?? 0,
                'pending' => $statsRaw['submit'] ?? 0, 
                'approved' => $statsRaw['diverifikasi'] ?? 0,
            ]
        ]);
    }

    // ✅ 2b. API: Statistik dan chart data
    public function getStats(Request $request)
    {
        $period = $request->query('period', 'all');
        $query = Pendaftaran::query();

        if ($period === 'month') {
            $query->whereYear('created_at', Carbon::now()->year)
                  ->whereMonth('created_at', Carbon::now()->month);
        }

        $total = $query->count();
        $statusCounts = (clone $query)
            ->select('status_pendaftaran', DB::raw('count(*) as total'))
            ->groupBy('status_pendaftaran')
            ->get()
            ->pluck('total', 'status_pendaftaran')
            ->all();

        $approved = $statusCounts['diverifikasi'] ?? 0;
        $fileCompletion = (clone $query)->withCount('dokumens')->get()->filter(fn($p) => $p->dokumens_count >= 4)->count();
        $averageHours = (clone $query)
            ->whereNotNull('tanggal_pengumuman')
            ->select(DB::raw('AVG(TIMESTAMPDIFF(HOUR, created_at, tanggal_pengumuman)) as avg_hours'))
            ->value('avg_hours') ?? 0;

        $trendData = (clone $query)
            ->select(
                DB::raw($period === 'month' ? "DATE_FORMAT(created_at, '%d %b') as period" : "DATE_FORMAT(created_at, '%b %Y') as period"),
                DB::raw('count(*) as total')
            )
            ->groupBy('period')
            ->orderByRaw('MIN(created_at)')
            ->get();

        $jurusanData = (clone $query)
            ->select('jurusan', DB::raw('count(*) as total'))
            ->groupBy('jurusan')
            ->orderByDesc('total')
            ->get();

        $topSchools = (clone $query)
            ->select('asal_sekolah', DB::raw('count(*) as total'))
            ->groupBy('asal_sekolah')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return response()->json([
            'total' => $total,
            'approved_ratio' => $total ? round(($approved / $total) * 100) : 0,
            'average_processing_hours' => round($averageHours, 1),
            'file_completion_rate' => $total ? round(($fileCompletion / $total) * 100) : 0,
            'trend' => $trendData->map(fn($row) => ['period' => $row->period, 'total' => $row->total]),
            'jurusan' => $jurusanData->map(fn($row) => ['jurusan' => $row->jurusan ?? 'Tidak Diketahui', 'total' => $row->total]),
            'status_counts' => [
                'draft' => $statusCounts['draft'] ?? 0,
                'pending' => $statusCounts['submit'] ?? 0,
                'approved' => $statusCounts['diverifikasi'] ?? 0,
                'rejected' => $statusCounts['rejected'] ?? 0,
            ],
            'top_schools' => $topSchools->map(fn($row) => ['asal_sekolah' => $row->asal_sekolah ?? 'Tidak Diketahui', 'count' => $row->total]),
        ]);
    }

    // ✅ 3. API: Detail pendaftar (Modal)
    public function show($id)
    {
        // Pastikan memanggil 'dokumens' sesuai nama fungsi di Model
        $p = Pendaftaran::with(['orangTua', 'dokumens', 'pembayaran', 'user'])->findOrFail($id);
        
        return response()->json([
            'id' => $p->id,
            'no_pendaftaran' => $p->no_pendaftaran,
            'nama_lengkap' => $p->nama_lengkap,
            'nisn' => $p->nisn,
            'nik' => $p->nik,
            'no_kk' => $p->no_kk,
            'tempat_lahir' => $p->tempat_lahir,
            'tanggal_lahir' => $p->tanggal_lahir ? $p->tanggal_lahir->format('d M Y') : '-',
            'jenis_kelamin' => $p->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan',
            'agama' => $p->agama,
            'no_hp' => $p->no_hp,
            'alamat' => $p->alamat_lengkap,
            'jurusan' => $p->jurusan,
            'asal_sekolah' => $p->asal_sekolah,
            'status' => $p->status_pendaftaran,
            'orang_tua' => $p->orangTua ? [
                'nama_ayah' => $p->orangTua->nama_ayah,
                'nama_ibu' => $p->orangTua->nama_ibu,
                'no_hp_ayah' => $p->orangTua->no_hp_ayah,
            ] : null,
            'dokumen' => $p->dokumens->map(function($d) {
                return [
                    'jenis' => $d->jenis_dokumen,
                    'url' => $d->file_path ? asset('storage/' . $d->file_path) : null,
                    'status' => $d->status_dokumen,
                ];
            }),
            'pembayaran' => $p->pembayaran ? [
                'bank' => $p->pembayaran->bank_transfer,
                'bukti_url' => $p->pembayaran->bukti_pembayaran_path ? asset('storage/' . $p->pembayaran->bukti_pembayaran_path) : null,
                'status' => $p->pembayaran->status_pembayaran,
            ] : null,
        ]);
    }

    // ✅ 4. API: Update status pendaftaran
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:draft,submit,diverifikasi',
        ]);
        
        $pendaftaran = Pendaftaran::findOrFail($id);
        
        try {
            $pendaftaran->update([
                'status_pendaftaran' => $request->status,
                'tanggal_pengumuman' => $request->status === 'diverifikasi' ? now() : null,
            ]);
            
            return response()->json(['message' => 'Status berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui status'], 500);
        }
    }

    // ✅ 5. API: Export CSV
    public function export(Request $request)
    {
        $query = Pendaftaran::query();

        if ($request->filled('period') && $request->period === 'month') {
            $query->whereYear('created_at', Carbon::now()->year)
                  ->whereMonth('created_at', Carbon::now()->month);
        }

        $data = $query->orderBy('created_at', 'desc')->get();
        $filename = "ppdb-export-".date('Ymd').".csv";
        
        return response()->streamDownload(function() use ($data) {
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF)); // BOM agar Excel tidak berantakan
            fputcsv($handle, ['No', 'Nama', 'NISN', 'Jurusan', 'Asal Sekolah', 'Status']);
            
            foreach ($data as $row) {
                fputcsv($handle, [
                    $row->no_pendaftaran, 
                    $row->nama_lengkap, 
                    $row->nisn, 
                    $row->jurusan, 
                    $row->asal_sekolah, 
                    $row->status_pendaftaran
                ]);
            }
            fclose($handle);
        }, $filename);
    }
}