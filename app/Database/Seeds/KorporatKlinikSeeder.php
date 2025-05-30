<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KorporatKlinikSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // === Pegawai Korporat IT (unit bisnis B1, unit usaha C1, unit kerja E13, sub F37) ===
        $db->table('pegawai')->insert([
            'id_pegawai'        => 'PG_300',
            'nik'               => 30000001,
            'nik_lama'          => 0,
            'nama'              => 'Andi Korporat',
            'nm_pgl'            => 'Andi',
            'gelar1'            => '',
            'gelar2'            => '',
            'jenis_kelamin'     => 'Pria',
            'tpt_lahir'         => 'Jakarta',
            'tgl_lahir'         => '1985-05-05',
            'gol_dar'           => 'O',
            'tinggi'            => 175,
            'berat'             => 75,
            'agama'             => 'Islam',
            'pend_terakhir'     => 'S2',
            'no_ktp'            => '1234567890123456',
            'no_kk'             => '1234567890123456',
            'alamat_ktp'        => 'Jl. Korporat No. 1',
            'alamat_dom'        => 'Jl. Korporat No. 1',
            'telpon1'           => '081234567891',
            'telpon2'           => '081234567892',
            'no_telp_keluarga'  => '081234567893',
            'email'             => 'andi.korporat@btm.com',
            'status_aktif'      => 1,
            'alasan_keluar'     => '',
            'ket_keluar'        => '',
            'status_pegawai'    => 'Aktif',
            'fungsi'            => 'Staff IT',
            'status_kwn'        => 'Kawin',
            'no_bpjs_kes'       => '1234567890',
            'no_bpjs_tkerja'    => '1234567890',
            'tgl_kerja'         => '2015-06-01',
            'tgl_diangkat_pwtt' => '2015-07-01',
            'tgl_cuti'          => null,
            'id_medis'          => 'MED300',
            'no_strsip'         => '',
            'tgl_strsip'        => null,
            'gol'               => 'III/a',
            'sgt'               => 'SGT2',
            'id_eselon'         => 'ESL2',
            'tmt_sgt'           => '2020-06-01',
            'tmt_gol'           => '2020-06-01',
            'tmt_eselon'        => '2020-06-01',
            'stat_pajak'        => 'Normal',
            'tk_pajak'          => 'TK0',
            'pjk_mulai'         => '2020-01-01',
            'pjk_akhir'         => '2020-12-31',
            'npwp'              => 'NPWP3000000001',
            'tgl_npwp'          => '2020-01-01',
            'id_bank'           => 'MANDIRI',
            'no_rek'            => '1234567890123456',
            'atas_nm'           => 'Andi Korporat',
            'image'             => 'default.jpg',
            'jatah_cuti'        => '12',
            'bar_code'          => 'barcode_andi.jpg',
            'qr_code'           => 'qrcode_andi.png',
        ]);

        $db->table('pegawai_penempatan')->insert([
            'id_pengawai_penempatan' => 'PP_300',
            'id_pegawai'             => 'PG_300',
            'id_unit_level'          => 'A10',
            'id_unit_bisnis'         => 'B1',
            'id_unit_usaha'          => 'C1',
            'id_unit_organisasi'     => 'D6',
            'id_unit_kerja'          => 'E13',
            'id_unit_kerja_sub'      => 'F37',
            'id_unit_lokasi'         => 'L1',
        ]);

        $db->table('user')->insert([
            'user_id'        => 'andi.korporat@btm.com',
            'id_pegawai'     => 'PG_300',
            'id_vendor'      => 0,
            'nama'           => 'Andi Korporat',
            'email'          => 'andi.korporat@btm.com',
            'password'       => password_hash('password123', PASSWORD_BCRYPT),
            'image'          => 'default.jpg',
            'is_active'      => 1,
            'role_id'        => '4',  // contoh role staff IT
            'id_application' => 'EYAB',
        ]);

        // === Pegawai Klinik (unit bisnis B3, unit usaha selain C1,C2,C3,C4,C5) ===
        $db->table('pegawai')->insert([
            'id_pegawai'        => 'PG_301',
            'nik'               => 30000002,
            'nik_lama'          => 0,
            'nama'              => 'Sari Klinik',
            'nm_pgl'            => 'Sari',
            'gelar1'            => '',
            'gelar2'            => '',
            'jenis_kelamin'     => 'Wanita',
            'tpt_lahir'         => 'Bandung',
            'tgl_lahir'         => '1992-08-15',
            'gol_dar'           => 'B',
            'tinggi'            => 160,
            'berat'             => 55,
            'agama'             => 'Kristen',
            'pend_terakhir'     => 'S1',
            'no_ktp'            => '9876543210987654',
            'no_kk'             => '9876543210987654',
            'alamat_ktp'        => 'Jl. Klinik No. 7',
            'alamat_dom'        => 'Jl. Klinik No. 7',
            'telpon1'           => '08987654321',
            'telpon2'           => '08987654322',
            'no_telp_keluarga'  => '08987654323',
            'email'             => 'sari.klinik@btm.com',
            'status_aktif'      => 1,
            'alasan_keluar'     => '',
            'ket_keluar'        => '',
            'status_pegawai'    => 'Aktif',
            'fungsi'            => 'Staff Klinik',
            'status_kwn'        => 'Belum Kawin',
            'no_bpjs_kes'       => '0987654321',
            'no_bpjs_tkerja'    => '0987654321',
            'tgl_kerja'         => '2018-09-01',
            'tgl_diangkat_pwtt' => '2018-10-01',
            'tgl_cuti'          => null,
            'id_medis'          => 'MED301',
            'no_strsip'         => '',
            'tgl_strsip'        => null,
            'gol'               => 'III/b',
            'sgt'               => 'SGT1',
            'id_eselon'         => 'ESL1',
            'tmt_sgt'           => '2019-09-01',
            'tmt_gol'           => '2019-09-01',
            'tmt_eselon'        => '2019-09-01',
            'stat_pajak'        => 'Normal',
            'tk_pajak'          => 'TK0',
            'pjk_mulai'         => '2019-01-01',
            'pjk_akhir'         => '2019-12-31',
            'npwp'              => 'NPWP3000000002',
            'tgl_npwp'          => '2019-01-01',
            'id_bank'           => 'BNI',
            'no_rek'            => '6543210987654321',
            'atas_nm'           => 'Sari Klinik',
            'image'             => 'default.jpg',
            'jatah_cuti'        => '12',
            'bar_code'          => 'barcode_sari.jpg',
            'qr_code'           => 'qrcode_sari.png',
        ]);

        $db->table('pegawai_penempatan')->insert([
            'id_pengawai_penempatan' => 'PP_301',
            'id_pegawai'             => 'PG_301',
            'id_unit_level'          => 'A20',
            'id_unit_bisnis'         => 'B3',
            'id_unit_usaha'          => 'C8',  
            'id_unit_organisasi'     => 'D10',
            'id_unit_kerja'          => 'E17',
            'id_unit_kerja_sub'      => 'F37',
            'id_unit_lokasi'         => 'L2',
        ]);

        $db->table('user')->insert([
            'user_id'        => 'sari.klinik@btm.com',
            'id_pegawai'     => 'PG_301',
            'id_vendor'      => 0,
            'nama'           => 'Sari Klinik',
            'email'          => 'sari.klinik@btm.com',
            'password'       => password_hash('password123', PASSWORD_BCRYPT),
            'image'          => 'default.jpg',
            'is_active'      => 1,
            'role_id'        => '4',  
            'id_application' => 'EYAB',
        ]);
    }
}
