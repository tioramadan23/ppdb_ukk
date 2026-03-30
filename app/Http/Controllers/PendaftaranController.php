use App\Models\Pendaftaran;

public function store(Request $request)
{
    // VALIDASI LENGKAP
    $validated = $request->validate([
        'nama_lengkap' => 'required',
        'nisn' => 'required|digits:10',
        'nik' => 'required|digits:16',
        'no_kk' => 'required|digits:16',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'no_hp_siswa' => 'required',
        'email' => 'required|email',
        'alamat_siswa' => 'required',
        'jurusan' => 'required',
        'asal_sekolah' => 'required',
    ]);

    // SIMPAN KE DATABASE
    Pendaftaran::create($validated);

    // OPTIONAL: hapus session lama
    session()->forget('pendaftaran');

    return redirect()->back()->with('success', 'Data berhasil disimpan ke database!');
}