<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => '01c43116-dccf-43c2-bc3d-3cdb0369d296', 'nama_pekerjaan' => 'Pengacara'],
            ['id' => '055fac55-da0c-479e-b3da-1da8acfdbfc3', 'nama_pekerjaan' => 'Transportasi'],
            ['id' => '081e3448-12bb-42ce-bf01-f1ebe30b8772', 'nama_pekerjaan' => 'Karyawan Honorer'],
            ['id' => '0d508a5a-2442-4d70-9f97-569c25a42e66', 'nama_pekerjaan' => 'Tukang Cukur'],
            ['id' => '130dbf0d-2d8b-4e0b-9b02-3b42bd85bdd9', 'nama_pekerjaan' => 'Perancang Busana'],
            ['id' => '136b7453-93b5-4555-b827-da5a7331de8a', 'nama_pekerjaan' => 'Wakil Gubernur'],
            ['id' => '14f5505b-c2d2-4b89-8901-818407e7cd0e', 'nama_pekerjaan' => 'Penyiar Radio'],
            ['id' => '171e7cf8-afea-4469-8538-3e41ae8c9294', 'nama_pekerjaan' => 'Kepala Desa'],
            ['id' => '1b3422cd-dca5-4bf0-8492-a4430811b5fe', 'nama_pekerjaan' => 'Akuntan'],
            ['id' => '1b40e10a-800e-4b24-9385-56c700380b8a', 'nama_pekerjaan' => 'Karyawan BUMD'],
            ['id' => '20b14019-10ca-477e-add5-ad1573ff436f', 'nama_pekerjaan' => 'Anggota Mahkamah Konstitusi'],
            ['id' => '2176338e-3dba-4b4f-b8cf-9a417c981dd1', 'nama_pekerjaan' => 'Karyawan Swasta'],
            ['id' => '218a8046-13da-4ad7-9c69-245c8ffe6aba', 'nama_pekerjaan' => 'Apoteker'],
            ['id' => '24cbbfd3-a5bf-41e3-b770-b16488fd9274', 'nama_pekerjaan' => 'Pedagang'],
            ['id' => '290a2fe8-db62-4950-b98a-f356589676e0', 'nama_pekerjaan' => 'Buruh Harian Lepas'],
            ['id' => '2d3efe65-5492-4143-840b-b53cb16644a5', 'nama_pekerjaan' => 'Buruh Peternakan'],
            ['id' => '2db1f806-741b-45e1-9d5f-c17050009301', 'nama_pekerjaan' => 'Pilot'],
            ['id' => '315aecd8-f3f2-46cd-8834-3e44cdc289bb', 'nama_pekerjaan' => 'Dokter'],
            ['id' => '382391d8-f689-44b5-b2dd-a621a50d0a01', 'nama_pekerjaan' => 'Imam Masjid'],
            ['id' => '3a25b13d-df3b-4209-8853-8b891ffbb65c', 'nama_pekerjaan' => 'Anggota Kabinet/ Kementerian'],
            ['id' => '3a71fe0c-7777-43d1-8014-a51f5f0af369', 'nama_pekerjaan' => 'Kepolisian RI'],
            ['id' => '3f549826-484c-409c-b7d7-e6f1426bf593', 'nama_pekerjaan' => 'Sopir'],
            ['id' => '449bd660-7e08-4b6a-be25-956dca29c8b3', 'nama_pekerjaan' => 'Pelajar/ Mahasiswa'],
            ['id' => '484b56a4-ac21-47d8-a99d-2c8f504fe91f', 'nama_pekerjaan' => 'Pelaut'],
            ['id' => '4a174ff1-1e54-4f8a-b829-e1f93c2fc1f1', 'nama_pekerjaan' => 'Karyawan BUMN'],
            ['id' => '4a26aa97-88cc-4141-bed9-b069dc95c672', 'nama_pekerjaan' => 'Wakil Walikota'],
            ['id' => '4d627fd9-9fbc-4367-bc70-cd9ed004514f', 'nama_pekerjaan' => 'Biarawati'],
            ['id' => '51f20825-fce5-4338-93c8-548932687f84', 'nama_pekerjaan' => 'Paraji'],
            ['id' => '55a6fc03-2d02-4030-a17a-d95028f4157f', 'nama_pekerjaan' => 'Buruh Tani/ Perkebunan'],
            ['id' => '573902b3-4403-4c7c-aeb4-492a73cdc6bc', 'nama_pekerjaan' => 'Mekanik'],
            ['id' => '5b40ba82-83c8-421b-8d84-d4b4ef104a56', 'nama_pekerjaan' => 'Pastor'],
            ['id' => '5d9d8260-68bc-4468-85c3-429c6e78dfa2', 'nama_pekerjaan' => 'Penata Rias'],
            ['id' => '603e82b8-db21-4ec3-a04e-4da6f18f2a75', 'nama_pekerjaan' => 'Seniman'],
            ['id' => '61e8f423-44f2-4d25-a210-62f001cc28b9', 'nama_pekerjaan' => 'Pegawai Negeri Sipil'],
            ['id' => '63661b83-d3f4-4e14-9db9-d4ed5491088f', 'nama_pekerjaan' => 'Nelayan/ Perikanan'],
            ['id' => '66288e60-fcf4-4dba-8dd3-4f8750906aa9', 'nama_pekerjaan' => 'Tukang Jahit'],
            ['id' => '6b9dbf49-ba29-408a-a607-0d9abf063694', 'nama_pekerjaan' => 'Konstruksi'],
            ['id' => '6bf0f488-5645-4b74-9ea0-e451324c81c2', 'nama_pekerjaan' => 'Dosen'],
            ['id' => '6bfe6021-7d71-4f59-8d70-77713f910356', 'nama_pekerjaan' => 'Arsitek'],
            ['id' => '6bff17b8-c9ba-4ef1-8e77-5eb2c308b4c9', 'nama_pekerjaan' => 'Tabib'],
            ['id' => '6dfa3b84-2fc8-4283-a58c-47d72b944fd5', 'nama_pekerjaan' => 'Juru Masak'],
            ['id' => '726b3d7b-ce24-44d9-a033-941e1ceea3af', 'nama_pekerjaan' => 'Pensiunan'],
            ['id' => '77bb58cc-3d2d-4b16-9b9d-114ea523e0f2', 'nama_pekerjaan' => 'Konsultan'],
            ['id' => '7be7a357-ae5c-49f9-8fea-c00e7481d648', 'nama_pekerjaan' => 'Buruh Nelayan/ Perikanan'],
            ['id' => '7ca6f010-6d35-4647-aeed-34a4d3678c61', 'nama_pekerjaan' => 'Duta Besar'],
            ['id' => '7f239828-5230-4b1e-95ab-e05a37cea08a', 'nama_pekerjaan' => 'Perangkat Desa'],
            ['id' => '7f3513ea-f84e-48a0-b0e4-5204eb5753ab', 'nama_pekerjaan' => 'Pialang'],
            ['id' => '7f52575f-d8b9-4cc6-8d40-30b8aba2578d', 'nama_pekerjaan' => 'Paranormal'],
            ['id' => '808ea6ac-877e-4767-96d4-166378b0e7a5', 'nama_pekerjaan' => 'Wakil Presiden'],
            ['id' => '822d9bdc-6f75-494c-a06e-e1402c3f01a7', 'nama_pekerjaan' => 'Mengurus Rumah Tangga'],
            ['id' => '825c2605-739f-4c21-835a-51c0f084b16e', 'nama_pekerjaan' => 'Ustadz/ Mubaligh'],
            ['id' => '82ef6010-3217-451a-9bde-cf42da0e9ea6', 'nama_pekerjaan' => 'Peneliti'],
            ['id' => '86bd8932-ed65-49a0-b7c6-7b14c2a08a73', 'nama_pekerjaan' => 'Psikiater/ Psikolog'],
            ['id' => '88dc7a4b-f989-47a0-903b-7ff4c1ffa5d7', 'nama_pekerjaan' => 'Guru'],
            ['id' => '88fbb3bc-b643-458d-a360-ccd494370e55', 'nama_pekerjaan' => 'Anggota DPR-RI'],
            ['id' => '8b483480-58c5-4d9c-b298-b6b7c0c79b0b', 'nama_pekerjaan' => 'Walikota'],
            ['id' => '913c326a-a6e0-47f9-bab1-6fd1be4619f8', 'nama_pekerjaan' => 'Tukang Listrik'],
            ['id' => '92a27f8e-6549-4631-b853-144b50dca9ab', 'nama_pekerjaan' => 'Gubernur'],
            ['id' => '9e063a13-5359-485a-94a9-48a8f01b6c19', 'nama_pekerjaan' => 'Penyiar Televisi'],
            ['id' => '9fcbac73-3cc3-4b4c-a4fa-e2292a16f116', 'nama_pekerjaan' => 'Presiden'],
            ['id' => 'a18e2b10-518e-434d-b024-fcd1ae68d1fb', 'nama_pekerjaan' => 'Wartawan'],
            ['id' => 'a7f85fd3-c8fb-4530-b395-77907b2c0115', 'nama_pekerjaan' => 'Anggota DPRD Kabupaten/ Kota'],
            ['id' => 'ac5b179f-a938-470a-8823-e56a25689c30', 'nama_pekerjaan' => 'Perdagangan'],
            ['id' => 'adea1b16-4e80-4513-a5b6-8a7ad2cd2582', 'nama_pekerjaan' => 'Tukang Gigi'],
            ['id' => 'b1eba9b8-8659-47d4-a453-cdc69c4614c5', 'nama_pekerjaan' => 'Pendeta'],
            ['id' => 'b295a3b4-ecb6-4240-aba1-541702111a71', 'nama_pekerjaan' => 'Promotor Acara'],
            ['id' => 'b4f34f3c-188d-4f88-8ce4-5f653d805c47', 'nama_pekerjaan' => 'Belum/ Tidak Bekerja'],
            ['id' => 'b83bbbdd-e64d-49af-a82d-23466ab9e6e1', 'nama_pekerjaan' => 'Tentara Nasional Indonesia'],
            ['id' => 'bec5dd07-a4e0-4414-b664-0f19b4290482', 'nama_pekerjaan' => 'Bupati'],
            ['id' => 'bf0b988e-50cd-4d97-a880-ba0278ae3c1c', 'nama_pekerjaan' => 'Anggota DPRD Provinsi'],
            ['id' => 'c5995939-219c-4023-aa1d-a31740d67fc8', 'nama_pekerjaan' => 'Tukang Kayu'],
            ['id' => 'c6c4e0d9-b68a-49bd-97b4-ff09c7ea3196', 'nama_pekerjaan' => 'Petani/ Pekebun'],
            ['id' => 'cdd69822-7f45-4220-a74e-908307c862ca', 'nama_pekerjaan' => 'Pembantu Rumah Tangga'],
            ['id' => 'd0b9c21e-e8ae-444f-b0b6-2e66249ce130', 'nama_pekerjaan' => 'Penata Rambut'],
            ['id' => 'd5e6ada3-335f-4564-a1bf-b75d11cdc624', 'nama_pekerjaan' => 'Industri'],
            ['id' => 'd8c7a1c8-1f06-45fb-8fe1-4f742b34a8aa', 'nama_pekerjaan' => 'Tukang Sol Sepatu'],
            ['id' => 'db3b099f-ae4e-4cd3-a435-3e0abeca09c3', 'nama_pekerjaan' => 'Wakil Bupati'],
            ['id' => 'ea85c650-551e-4d1d-91a0-4505e71610dd', 'nama_pekerjaan' => 'Anggota DPD'],
            ['id' => 'eb27364c-b37b-4409-a912-12197832fd60', 'nama_pekerjaan' => 'Peternak'],
            ['id' => 'eb802b5d-59f1-464b-80aa-cc030d29795e', 'nama_pekerjaan' => 'Tukang Batu'],
            ['id' => 'ecbacc34-08bb-4c99-a85e-5c24e941333c', 'nama_pekerjaan' => 'Notaris'],
            ['id' => 'f2c4e52b-c6ac-473f-b310-d79db8250c18', 'nama_pekerjaan' => 'Tukang Las/ Pandai Besi'],
            ['id' => 'f507a356-e7e4-41e4-9102-4198f7ce44a1', 'nama_pekerjaan' => 'Perawat'],
            ['id' => 'fb173c5d-f7f5-4546-9484-fbcc789bbb40', 'nama_pekerjaan' => 'Penterjemah'],
            ['id' => 'fb939eb2-3098-4e23-88e3-6a20ca4e8309', 'nama_pekerjaan' => 'Bidan'],
            ['id' => 'fbc5d0fb-7c00-40df-b011-ae2401b7b48b', 'nama_pekerjaan' => 'Penata Busana'],
            ['id' => 'fe9a1449-75e4-4303-bcfd-0d4d7438c6e9', 'nama_pekerjaan' => 'Wiraswasta'],
            ['id' => 'ff405113-7461-45e1-b522-662f326a63df', 'nama_pekerjaan' => 'Anggota BPK']
        ];

        DB::table('job_types')->insert($data);
    }
}
