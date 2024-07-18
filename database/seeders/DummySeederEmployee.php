<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Hash;

class DummySeederEmployee extends Seeder
{
    public function run(): void
    {
        $period = CarbonPeriod::create('1985-01-01', '2001-12-31');
        $dates = [];
        // Iterate over the period
        foreach ($period as $ellen => $date) {
            $dates[$ellen] =  $date->format('Y-m-d');
        }
        $cohooserDate = count($dates)-1;
        $tempatLahir = ['Surabaya', 'Malang', 'Sidoarjo', 'Mojokerto', 'Pasuruan', 'Probolinggo', 'Jember', 'Kediri', 'Blitar', 'Madiun', 'Banyuwangi', 'Tulungagung', 'Bojonegoro', 'Bondowoso', 'Lamongan', 'Tuban', 'Gresik', 'Pamekasan', 'Bangkalan', 'Lumajang', 'Nganjuk', 'Magetan', 'Ponorogo', 'Trenggalek', 'Sumenep', 'Sampang'];
        $tempatTinggal = [];
        $alamatKtp = [];

        foreach ($tempatLahir as $tempat) {
            // Misalkan untuk tempat tinggal dan alamat KTP kita tambahkan 'Jalan [nama tempat] No. [nomor acak]'
            $tempatTinggal[] = 'Jalan ' . $tempat . ' No. ' . rand(1, 100);
            $alamatKtp[] = 'Jalan ' . $tempat . ' No. ' . rand(1, 100);
        }
        $jenisKelamin = ['Laki-laki','Perempuan'];
        $gologanDarah = ['A','B','AB','O'];
        $agama = ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'];
        $statusPernikahan = ['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'];
        $kewarganegaraan = ['WNI','WNA'];
        $bank = ['Mandiri', 'BRI', 'BCA', 'BNI', 'CIMB', 'Danamon', 'Permata', 'BTN', 'Mega', 'OCBC'];
        $divisi = DB::table('divisions')->select('id')->get();
        $divisi = json_decode(json_encode($divisi), true);
        $posisi = DB::table('job_positions')->select('id')->get();
        $posisi = json_decode(json_encode($posisi), true);
        $pekerjaan = DB::table('job_types')->select('id')->get();
        $pekerjaan = json_decode(json_encode($pekerjaan), true);

        for ($i=0; $i < 100; $i++) 
        { 
            $userIdUuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            $arrDates = $dates[rand(0,$cohooserDate)];
            $name = fake()->name();
            $user_name = strtolower(str_replace(' ', '_', $name));
            $userId = DB::table('users')->insertGetId([
                        'id' => $userIdUuid,
                        'id_role'   =>  5,
                        'nama' => $name,
                        'username'  =>  $user_name,
                        'password'  =>  Hash::make('password'),
                        'foto' => 'avatar.png'
                    ]);

            $chooserTempatLahir = rand(0,3);
            $arrTempatLahir = $tempatLahir[$chooserTempatLahir];

            $chooserTempatTinggal = rand(0,3);
            $arrTempatTinggal = $tempatTinggal[$chooserTempatTinggal];

            $chooserAlamatKtp = rand(0,3);
            $arrAlamatKtp = $alamatKtp[$chooserAlamatKtp];

            $chooserJenisKelamin = rand(0,1);
            $arrJenisKelamin = $jenisKelamin[$chooserJenisKelamin];

            $chooserGolonganDarah = rand(0,3);
            $arrGolonganDarah = $gologanDarah[$chooserGolonganDarah];

            $chooserAgama = rand(0,5);
            $arrAgama = $agama[$chooserAgama];

            $chooserStatusPernikahan = rand(0,3);
            $arrStatusPernikahan = $statusPernikahan[$chooserStatusPernikahan];

            $chooserKewarganegaraan = rand(0,1);
            $arrKewarganegaraan = $kewarganegaraan[$chooserKewarganegaraan];

            $chooserBank = rand(0,9);
            $arrBank = $bank[$chooserBank];

            $chooserDivisi = rand(0,count($divisi)-1);
            $arrDivisi = $divisi[$chooserDivisi]['id'];

            $chooserPosisi = rand(0,count($posisi)-1);
            $arrPosisi = $posisi[$chooserPosisi]['id'];

            $chooserPekerjaan = rand(0,count($pekerjaan)-1);
            $arrPekerjaan = $pekerjaan[$chooserPekerjaan]['id'];

            DB::table('employees')->insert([
                'id'=>\Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id_user'=>$userIdUuid, //revert table
                'nama_lengkap' => $name,
                'email' => fake()->unique()->safeEmail(),
                'tempat_lahir' => $arrTempatLahir,
                'tanggal_lahir' => $arrDates,
                'jenis_kelamin' => $arrJenisKelamin,
                'id_divisi' => $arrDivisi, //revert table
                'id_posisi' => $arrPosisi, //revert table
                'no_hp' =>'08'.rand(0,9).rand(1,9).rand(2,9).rand(3,9).rand(4,9).rand(5,9).rand(6,9).rand(7,9).rand(8,9),
                'alamat_ktp' => $arrAlamatKtp,
                'agama' => $arrAgama,
                'tempat_tinggal' => $arrTempatTinggal,
                'status_pernikahan' => $arrStatusPernikahan,
                'kewarganegaraan' => $arrKewarganegaraan,
                'golongan_darah' => $arrGolonganDarah,
                'nik' => '35'.rand(0,9).rand(1,9).rand(2,9).rand(3,9).rand(4,9).rand(5,9).rand(6,9).rand(7,9).rand(8,9).rand(9,9).rand(1,9).rand(2,9).rand(3,9).rand(4,9),
                'foto_ktp' => 'ktp.jpg',
                'id_pekerjaan' => $arrPekerjaan, //revert table
                'bank' => $arrBank,
                'nomor_rekening' => '35'.rand(0,9).rand(1,9).rand(2,9).rand(3,9).rand(4,9).rand(5,9).rand(6,9).rand(7,9).rand(8,9).rand(9,9).rand(1,9).rand(2,9).rand(3,9).rand(4,9)
            ]);
        }
    }
}