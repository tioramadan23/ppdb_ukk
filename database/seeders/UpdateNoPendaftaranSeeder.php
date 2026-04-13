<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pendaftaran;

class UpdateNoPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendaftarans = Pendaftaran::whereNull('no_pendaftaran')->get();
        $lastNumber = Pendaftaran::whereNotNull('no_pendaftaran')->orderBy('id', 'desc')->first();
        $nextNumber = $lastNumber ? intval(substr($lastNumber->no_pendaftaran, -6)) + 1 : 1;

        foreach ($pendaftarans as $pendaftaran) {
            $pendaftaran->update([
                'no_pendaftaran' => 'BPM-' . date('Y') . '-' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT)
            ]);
            $nextNumber++;
        }

        $this->command->info('No pendaftaran updated for ' . $pendaftarans->count() . ' records');
    }
}