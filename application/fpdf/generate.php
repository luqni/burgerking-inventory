<?php
include "database.php";
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
$pdf->SetLeftMargin(19);
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('times','B',11);
// mencetak string 
$pdf->Cell(190,5,'PEMERINTAH PROVINSI JAWA TENGAH',0,1,'C');
$pdf->Image('images/logo-jateng.png',12,10,30,30);
$pdf->Cell(190,5,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0,1,'C');
$pdf->SetFont('times','B',16);
$pdf->Cell(190,7,'SEKOLAH MENENGAH ATAS NEGERI 1 COMAL',0,1,'C');
$pdf->SetFont('times','',9);
$pdf->Cell(190,7,'Jalan Jendral Ahmad Yani Nomor 77 Comal, Pemalang Kode Pos 52363',0,1,'C');
$pdf->Cell(190,2,'Telp : 0285 577190 Surat Elektronik smanegeri_1comal@yahoo.co.id',0,1,'C');
$pdf->Line(20, 40, 210-20, 40);
$pdf->SetFont('times','U',16);
$pdf->Cell(190,30,'SURAT KETERANGAN',0,1,'C');
$pdf->SetFont('times','B',9);
$pdf->Cell(190,-15,'Nomor : 421.3 / 191 / 2020',0,1,'C');
$pdf->SetFont('times','',10);
$pdf->Cell(150,40,'Yang bertanda tangan dibawah ini Kepala SMA Negeri 1 Comal Kabupaten Pemalang,',0,1);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('times','',10);
$pdf->Cell(20,-35,'Nama',0,0);
$pdf->Cell(25,-35,'',0,0);
$pdf->Cell(27,-35,': Drs. Murhono, M.Pd',0,1);
$pdf->Cell(20,45,'NIP',0,0);
$pdf->Cell(25,45,'',0,0);
$pdf->Cell(27,45,': 19650302 199512 1 004',0,1);
$pdf->Cell(20,-35,'Pangkat / Gol',0,0);
$pdf->Cell(25,-35,'',0,0);
$pdf->Cell(27,-35,': Pembina / IV.b',0,1);

$pdf->SetFont('times','',10);
$pdf->Cell(150,55,'Dengan ini menerangkan bahwa,',0,1);

$no_ujian = $_REQUEST['id'];
$hasil = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE no_ujian='$no_ujian'");
while ($row = mysqli_fetch_array($hasil)){
    $pdf->SetFont('times','',10);
    $pdf->Cell(20,-35,'Nama',0,0);
    $pdf->Cell(28,-35,':',0,0,'R');
    $pdf->Cell(27,-35,$row['nama'],0,1);
    $pdf->Cell(20,45,'TTL',0,0);
    $pdf->Cell(28,45,':',0,0,'R');
    $pdf->Cell(15,45,$row['tempat_lahir'],0,0);
    $pdf->Cell(2,45,',',0,0,'R');
    $tanggal_subs = substr($row['tanggal_lahir'],0,2);
    $bulan_subs = substr($row['tanggal_lahir'],3,2);
    $tahun_subs = substr($row['tanggal_lahir'],6,4);
    $bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
        );
    if(substr($bulan_subs,0,1) == '0'){
        $bulan_subs = substr($bulan_subs,1,1);
    }
    $pdf->Cell(27,45,$tanggal_subs.' '.$bulan[$bulan_subs].' '.$tahun_subs,0,1,'L');
    $pdf->Cell(20,-35,'No. Peserta',0,0);
    $pdf->Cell(28,-35,':',0,0,'R');
    $pdf->Cell(27,-35,$row['no_ujian'],0,1);
    $pdf->Cell(20,45,'NIS',0,0);
    $pdf->Cell(28,45,':',0,0,'R');
    $pdf->Cell(27,45,$row['nis'],0,1);
    $pdf->Cell(20,-35,'NISN',0,0);
    $pdf->Cell(28,-35,':',0,0,'R');
    $pdf->Cell(27,-35,$row['nisn'],0,1);
}

$pdf->SetFont('times','',10);
$pdf->Cell(150,65,'Telah mengikuti seluruh program pembelajaran dari semester 1 (satu) sampai dengan semester 6 (enam), Ujian Praktik',0,1);
$pdf->Cell(75,-50,'dan Ujian Sekolah pada tahun 2020 dan dinyatakan',0,0);
$pdf->SetFont('times','B',10);

$no_ujian = $_REQUEST['id'];
$hasil = mysqli_query($db_conn,"SELECT status FROM data_siswa WHERE no_ujian='$no_ujian'");
while ($row = mysqli_fetch_array($hasil)){
    if($row['status'] == 1){
        $pdf->Cell(15,-50,'LULUS / TIDAK LULUS',0,1);
        $pdf->Line(110, 153, 135, 153);
    }else{
        $pdf->Cell(15,-50,'LULUS / TIDAK LULUS',0,1);
        $pdf->Line(95, 153, 108, 153);
    }
}

$pdf->SetFont('times','',10);
$pdf->Cell(150,65,'Demikian Surat Keterangan ini dibuat untuk dapat digunakan sebagaimana mestinya.',0,1);

$pdf->SetFont('times','',10);
$pdf->Cell(130,5,'',0,0);
$pdf->Cell(30,5,'Comal, 2 Mei 2020',0,1);
$pdf->Cell(130,3,'',0,0);
$pdf->Cell(28,3,'Kepala Sekolah,',0,1);

$pdf->Image('images/tanda_tangan.jpeg',135,202,50,25);
$pdf->Cell(130,70,'',0,0);
$pdf->Cell(28,70,'NIP.19650302 199512 1 004',0,1);
$pdf->Cell(130,-80,'',0,0);
$pdf->Cell(130,-80,'Drs. Murhono, M.Pd',0,1);
$no_ujian = $_REQUEST['id'];
$hasil = mysqli_query($db_conn,"SELECT username FROM data_siswa WHERE no_ujian='$no_ujian'");
    while ($row = mysqli_fetch_array($hasil)){
    $path = 'images/foto-berwarna/';
    $filename = $row['username'].'.JPG';
    $filepath = $path.$filename;
    $pdf->Image($filepath,85,198,30,40);
    }
$pdf->Image('images/stempel.png',98,195,60,50);
$pdf->AddPage();


$pdf->SetFont('times','B',8);
// mencetak string 
$pdf->Cell(190,5,'PEMERINTAH PROVINSI JAWA TENGAH',0,1,'C');
$pdf->Image('images/logo-jateng.png',25,10,25,25);
$pdf->Cell(190,5,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0,1,'C');
$pdf->SetFont('times','B',10);
$pdf->Cell(190,7,'SEKOLAH MENENGAH ATAS NEGERI 1 COMAL',0,1,'C');
$pdf->SetFont('times','',8);
$pdf->Cell(190,7,'Jalan Jendral Ahmad Yani Nomor 77 Comal, Pemalang Kode Pos 52363',0,1,'C');
$pdf->Cell(190,2,'Telp : 0285 577190 Surat Elektronik smanegeri_1comal@yahoo.co.id',0,1,'C');
$pdf->Line(20, 40, 216-20, 40);
$pdf->Cell(190,5,'',0,1,'C');

$pdf->SetFont('times','BU',8);
$pdf->Cell(190,5,'SURAT KETERANGAN LULUS',0,1,'C');
// $pdf->Line(96, 45, 145-10, 45);
$pdf->SetFont('times','',8);
$pdf->Cell(190,5,'Nomor : 421.3 / 191 / 2020',0,1,'C');
$pdf->Cell(190,2,'',0,1,'C');
$pdf->SetFont('times','B',8);
$pdf->Cell(190,4,'SMA NEGERI 1 COMAL',0,1,'C');

$no_ujian = $_REQUEST['id'];
$hasil = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE no_ujian='$no_ujian'");
while ($row = mysqli_fetch_array($hasil)){
    $data = $row['deskripsi_jurusan'];
    $peminatan = substr($data,9);
    if($row['deskripsi_jurusan'] == "PEMINATAN MATEMATIKA DAN ILMU PENGETAHUAN ALAM")
    {
        $pdf->Cell(67,4,'PEMINATAN :',0,0,'R');
        $pdf->Cell(110,4,substr($row['deskripsi_jurusan'],9),0,1,'L');
    }elseif ($row['deskripsi_jurusan'] == "PEMINATAN ILMU PENGETAHUAN SOSIAL")
    {
        $pdf->Cell(83,4,'PEMINATAN :',0,0,'R');
        $pdf->Cell(110,4,substr($row['deskripsi_jurusan'],9),0,1,'L');
    }else{
        $pdf->Cell(88,4,'PEMINATAN :',0,0,'R');
        $pdf->Cell(110,4,substr($row['deskripsi_jurusan'],9),0,1,'L');
    }
    $pdf->Cell(190,4,'TAHUN PELAJARAN 2019/2020',0,1,'C');
    $pdf->Cell(150,4,'',0,1);
    $pdf->SetFont('times','',8);
    $pdf->Cell(150,5,'Yang bertanda tangan di bawah ini, Kepala Sekolah Menengah Atas Negeri 1 Comal Kabupaten Pemalang, Provinsi Jawa Tengah menerangkan bahwa :',0,1);
    $pdf->Cell(50,4,'Nama',0,0);
    $pdf->Cell(28,4,':',0,0,'R');
    $pdf->Cell(27,4,$row['nama'],0,1);
    $pdf->Cell(50,2,'Tempat dan Tanggal Lahir',0,0);
    $pdf->Cell(28,2,':',0,0,'R');
    $pdf->Cell(12,2,$row['tempat_lahir'],0,0);
    $pdf->Cell(2,2,',',0,0,'R');
    $tanggal_subs = substr($row['tanggal_lahir'],0,2);
    $bulan_subs = substr($row['tanggal_lahir'],3,2);
    $tahun_subs = substr($row['tanggal_lahir'],6,4);
    $bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
        );
    if(substr($bulan_subs,0,1) == '0'){
        $bulan_subs = substr($bulan_subs,1,1);
    }
    $pdf->Cell(20,2,$tanggal_subs.' '.$bulan[$bulan_subs].' '.$tahun_subs,0,1,'L');
    $pdf->Cell(50,4,'Nama Orang Tua / Wali',0,0);
    $pdf->Cell(28,4,':',0,0,'R');
    $pdf->Cell(27,4,$row['nama_orangtua'],0,1);
    $pdf->Cell(50,2,'Nomor Induk Siswa',0,0);
    $pdf->Cell(28,2,':',0,0,'R');
    $pdf->Cell(27,2,$row['nis'],0,1);
    $pdf->Cell(50,4,'Nomor Induk Siswa Nasional',0,0);
    $pdf->Cell(28,4,':',0,0,'R');
    $pdf->Cell(27,4,$row['nisn'],0,1);
    $pdf->Cell(27,3,'',0,1);

    $pdf->Cell(13,4,'dinyatakan',0,0);
    $pdf->SetFont('times','B',8);
    if($row['status'] == 1){
        $pdf->Cell(10,4,'LULUS',0,0);
    }else{
        $pdf->Cell(20,4,'TIDAK LULUS',0,0);
    }
    $pdf->SetFont('times','',8);
    $pdf->Cell(27,4,'dari satuan pendidikan berdasarkan kriteria kelulusan SMA Negeri 1 Comal Kabupaten Pemalang Tahun Pelajaran 2019/2020,',0,1);
    $pdf->Cell(27,3,'dengan nilai sebagai berikut :',0,1);
    $pdf->Cell(27,3,'',0,1);

    $pdf->SetFont('times','B',8); 
    $pdf->Cell(10,4,'No',1,0, 'C');
    $pdf->Cell(110,4,'Mata Pelajaran',1,0,'C');
    $pdf->Cell(40,4,'Nilai Ujian Sekolah',1,1, 'C');
    $pdf->Cell(160,1,'',1,1);

    $pdf->Cell(160,4,'Kelompok A',1,1);
    $pdf->SetFont('times','',8); 
    $pdf->Cell(10,3.5,'1',1,0, 'C');
    $pdf->Cell(110,3.5,'Pendidikan Agama dan Budi Pekerti',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_pai_a'],1,1, 'C');
    $pdf->Cell(10,3.5,'2',1,0, 'C');
    $pdf->Cell(110,3.5,'Pendidikan Pancasila dan Kewarganegaraan',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_pkn_a'],1,1, 'C');
    $pdf->Cell(10,3.5,'3',1,0, 'C');
    $pdf->Cell(110,3.5,'Bahasa Indonesia',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_bindonesia_a'],1,1, 'C');
    $pdf->Cell(10,3.5,'4',1,0, 'C');
    $pdf->Cell(110,3.5,'Matematika',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_matematika_a'],1,1, 'C');
    $pdf->Cell(10,3.5,'5',1,0, 'C');
    $pdf->Cell(110,3.5,'Sejarah Indonesia',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_sejarah_a'],1,1, 'C');
    $pdf->Cell(10,3.5,'6',1,0, 'C');
    $pdf->Cell(110,3.5,'Bahasa Inggris',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_binggris_a'],1,1, 'C');

    $pdf->SetFont('times','B',8); 
    $pdf->Cell(160,4,'Kelompok B',1,1);
    $pdf->SetFont('times','',8);
    $pdf->Cell(10,3.5,'1',1,0, 'C');
    $pdf->Cell(110,3.5,'Seni Budaya',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_seni_b'],1,1, 'C');
    $pdf->Cell(10,3.5,'2',1,0, 'C');
    $pdf->Cell(110,3.5,'Pendidikan Jasmani, Olahraga dan Kesehatan',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_penjas_b'],1,1, 'C');
    $pdf->Cell(10,3.5,'3',1,0, 'C');
    $pdf->Cell(110,3.5,'Prakarya dan Kewirausahaan',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_prakarya_b'],1,1, 'C');
    $pdf->Cell(10,3.5,'4',1,0, 'C');
    $pdf->Cell(150,3.5,'Muatan Lokal',1,1);
    $pdf->Cell(10,3.5,'',1,0, 'C');
    $pdf->Cell(110,3.5,'a. Bahasa Jawa',1,0);
    $pdf->Cell(40,3.5,$row['n_uas_bjawa_b'],1,1, 'C');
    $pdf->Cell(10,3.5,'',1,0, 'C');
    $pdf->Cell(150,3.5,'b.',1,1);
    $pdf->Cell(10,3.5,'',1,0, 'C');
    $pdf->Cell(110,3.5,'c. ',1,0);
    $pdf->Cell(40,3.5,'',1,1, 'C');
    

    $pdf->SetFont('times','B',8);
    $pdf->Cell(160,4,'Kelompok C',1,1);
    $pdf->SetFont('times','',8);

    $no_ujian = $_REQUEST['id'];
    $hasil = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE no_ujian='$no_ujian'");
    while ($row = mysqli_fetch_array($hasil)){
        if($row['deskripsi_jurusan'] == 'PEMINATAN MATEMATIKA DAN ILMU PENGETAHUAN ALAM'){
            $pdf->Cell(10,3.5,'1',1,0, 'C');
            $pdf->Cell(110,3.5,'Matematika',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_matematika_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'2',1,0, 'C');
            $pdf->Cell(110,3.5,'Biologi',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_biologi_c'],1,1, 'C');
            $pdf->Cell(10,3.54,'3',1,0, 'C');
            $pdf->Cell(110,3.5,'Fisika',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_fisika_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'4',1,0, 'C');
            $pdf->Cell(110,3.5,'Kimia',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_kimia_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'5',1,0, 'C');
            $pdf->Cell(150,3.5,'Pilihan Lintas Minat / Pendalaman Minat',1,1);
            $pdf->Cell(10,3.5,'',1,0, 'C');
            if($row['jurusan'] == 'MIPA 5' || $row['jurusan'] == 'MIPA 6'){
                $pdf->Cell(110,3.5,'Bahasa dan Sastra Inggris',1,0);
                $pdf->Cell(40,3.5,$row['n_uas_minat_c'],1,1, 'C');
            }else{
                $pdf->Cell(110,3.5,'Geografi',1,0);
                $pdf->Cell(40,3.5,$row['n_uas_minat_c'],1,1, 'C');
            }
            $pdf->Cell(10,3.5,'',1,0, 'C');
            $pdf->Cell(110,3.5,'........................................',1,0);
            $pdf->Cell(40,3.5,'',1,1, 'C');
        }elseif($row['deskripsi_jurusan'] == 'PEMINATAN ILMU PENGETAHUAN SOSIAL'){
            $pdf->Cell(10,3.5,'1',1,0, 'C');
            $pdf->Cell(110,3.5,'Geografi',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_matematika_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'2',1,0, 'C');
            $pdf->Cell(110,3.5,'Sejarah',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_biologi_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'3',1,0, 'C');
            $pdf->Cell(110,3.5,'Sosiologi',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_fisika_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'4',1,0, 'C');
            $pdf->Cell(110,3.5,'Ekonomi',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_kimia_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'5',1,0, 'C');
            $pdf->Cell(150,3.5,'Pilihan Lintas Minat / Pendalaman Minat',1,1);
            $pdf->Cell(10,3.5,'',1,0, 'C');
            $pdf->Cell(110,3.5,'Bahasa dan Sastra Inggris',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_minat_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'',1,0, 'C');
            $pdf->Cell(110,3.5,'........................................',1,0);
            $pdf->Cell(40,3.5,'',1,1, 'C');
        }else{
            $pdf->Cell(10,3.5,'1',1,0, 'C');
            $pdf->Cell(110,3.5,'Bahasa dan Satra indonesia',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_matematika_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'2',1,0, 'C');
            $pdf->Cell(110,3.5,'Bahasa dan Sastra inggis',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_biologi_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'3',1,0, 'C');
            // $pdf->Cell(110,3.5,'Bahasa dan Sastra Asing Lain : Bahasa dan sastra perancis',1,0);
            // $pdf->Cell(40,3.5,$row['n_uas_fisika_c'],1,1, 'C');
            $pdf->Cell(150,3.5,'Bahasa dan Sastra Asing Lain :',1,1);
            $pdf->Cell(10,3.5,'',1,0, 'C');
            $pdf->Cell(110,3.5,'Bahasa dan sastra perancis',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_fisika_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'4',1,0, 'C');
            $pdf->Cell(110,3.5,'Antropologi',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_kimia_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'5',1,0, 'C');
            $pdf->Cell(150,3.5,'Pilihan Lintas Minat / Pendalaman Minat',1,1);
            $pdf->Cell(10,3.5,'',1,0, 'C');
            $pdf->Cell(110,3.5,'Biologi',1,0);
            $pdf->Cell(40,3.5,$row['n_uas_minat_c'],1,1, 'C');
            $pdf->Cell(10,3.5,'',1,0, 'C');
            $pdf->Cell(110,3.5,'........................................',1,0);
            $pdf->Cell(40,3.5,'',1,1, 'C');
        }

        $pdf->SetFont('times','B',8);
        $pdf->Cell(120,3.5,'Rata-rata',1,0,'C');
        $pdf->Cell(40,3.5,$row['rata_rata_uas'],1,1, 'C');
    }
    $pdf->Cell(27,2,'',0,1);
    $pdf->SetFont('times','',8);
    $pdf->Cell(27,3,'Surat Keterangan Lulus ini berlaku sementara sampai dengan diterbitkannya Ijazah Tahun Pelajaran 2019/2020, untuk menjadikan maklum',0,1);
    $pdf->Cell(27,3,'bagi yang berkepentingan.',0,1);
    $pdf->SetFont('times','',8);
    $pdf->Cell(100,1,'',0,0);
    $pdf->Cell(30,5,'Pemalang, 2 Mei 2020',0,1);
    $pdf->Cell(100,3,'',0,0);
    $pdf->Cell(28,3,'Kepala Sekolah,',0,1);
    $pdf->Image('images/tanda_tangan.jpeg',107,210,50,25);
    $no_ujian = $_REQUEST['id'];
    $hasil = mysqli_query($db_conn,"SELECT username FROM data_siswa WHERE no_ujian='$no_ujian'");
    while ($row = mysqli_fetch_array($hasil)){
        $path = 'images/foto-berwarna/';
        $filename = $row['username'].'.JPG';
        $filepath = $path.$filename;
        $pdf->Image($filepath,70,205,25,30);
    }
$pdf->Image('images/stempel.png',80,200,50,40);
    $pdf->Cell(100,50,'',0,0);
    $pdf->Cell(100,50,'NIP.19650302 199512 1 004',0,1);
    $pdf->Cell(100,-42,'',0,0);
    $pdf->Cell(100,-42,'Drs. Murhono, M.Pd',0,1);
}
$pdf->SetFont('times','BI',8);
$pdf->Cell(190,55,'SMA / 20324218',0,1);

$pdf->Output();
?>