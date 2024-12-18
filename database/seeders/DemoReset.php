<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Pendaftaran;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoReset extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = 1;
Pendaftaran::truncate();
Prodi::truncate();
Fakultas::truncate();
DB::table('fakultas')->insert([
'nama_fakultas' => 'FTIK',
]);
DB::table('fakultas')->insert([
'nama_fakultas' => 'FE',
]);
DB::table('prodis')->insert([
'fakultas_id' => 1,
'nama_prodi' => 'S1 Sistem Informasi',
]);
DB::table('prodis')->insert([
'fakultas_id' => 1,
'nama_prodi' => 'S1 Teknik Informatika',
]);
DB::table('prodis')->insert([
'fakultas_id' => 1,
'nama_prodi' => 'S1 Ilmu Komunikasi',
]);
DB::table('prodis')->insert([
'fakultas_id' => 1,
'nama_prodi' => 'S1 Pariwisata',
]);
DB::table('prodis')->insert([
'fakultas_id' => 2,
'nama_prodi' => 'D3 Manajemen Perusahaan',
]);
DB::table('prodis')->insert([
'fakultas_id' => 2,
'nama_prodi' => 'S1 Manajemen',

]);
DB::table('prodis')->insert([
'fakultas_id' => 2,
'nama_prodi' => 'S1 Akuntansi',
]);
for($i=0;$i<100;$i++){
DB::table('pendaftarans')
->insert($this->create_pendaftaran(
rand(1,7), rand(1,3), $user_id));
    }
    }

    public function create_pendaftaran($prodi_id, $status, $user_id){
        $daftar_status = ['1' => 'DAFTAR', '2' => 'TERIMA', '3' => 'TOLAK'];
        return [
        'nama_lengkap' => 'Yanto Mulyanto',
        'alamat' => 'Jl Kali 20',
        'kota' => 'Surabaya',
        'tanggal_lahir' => '2000-03-05',
        'asal_sekolah' => 'SMAN 1',
        'ijazah_url' => '-',
        'prodi_id' => $prodi_id,
        'status' => $daftar_status[$status],
        'tanggal_pendaftaran' => Carbon::today()->subDays(rand(0, 30)),
        'user_id' => $user_id,
        ];
        }
    
}