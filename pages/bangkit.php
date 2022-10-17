<?php
require_once('../database/init.php');
error_reporting(0);
ini_set('display_errors', 0);
include('fungsiterbilang.php');

function e($p, $q)
{
        $a = rand(2, $p - 1);
        $b = rand(2, $p + 1);
        $c = rand(2, $q + 1);
        $d = rand(2, $q - 1);
        $e = array($a, $b, $c, $d);
        return $e[array_rand($e)];
}

function enkripsi($teks, $n, $e)
{
        //Pesan dikodekan menjadi kode ASCII, Kemudian di Enkripsi Per Karakter
        $hasil = '';
        for ($i = 0; $i < strlen($teks); ++$i) {
                //Rumus Enkripsi
                $hasil .= gmp_strval(gmp_mod(gmp_pow(ord($teks[$i]), $e), $n));
                //Antar Tiap Karakter dipisahkan dengan spasi
                if ($i != strlen($teks) - 1) {
                        $hasil .= (" ");
                }
        }
        return $hasil;
}

function dekripsi($teks, $dp, $dq, $qinv, $p, $q)
{

        $M = '';
        $hasil = '';
        $teks = explode(" ", $teks);
        foreach ($teks as $nilai) {
                $m1 = gmp_mod(gmp_pow($nilai, $dp), $p);
                $m2 = gmp_mod(gmp_pow($nilai, $dq), $q);
                $h  = gmp_mod(($qinv * ($m1 - $m2)), $p);
                $M  .= chr(gmp_strval($m2 + $h * $q));
                //Rumus Deskripsi
        }
        return $M;
}


//bangkit kunci
if (isset($_GET['bangkit'])) {
        $p = $_GET['p'];
        $q = $_GET['q'];
        $e = e($p, $q);
        $n = gmp_mul($p, $q);
        $valn = gmp_strval($n);
        $m = gmp_mul(gmp_sub($p, 1), gmp_sub($q, 1));
        for ($e; $e < 1000; $e++) {  // Mencoba dengan Perulangan 1000 Kali 
                $fpb = gmp_gcd($e, $m);
                if (gmp_strval($fpb) == '1') // Jika Benar E adalah FPB dari E dan M = 1 <-- Hentikan Proses
                        break;
        }
        $i = 1;
        do {
                $key = gmp_div_qr(gmp_add(gmp_mul($m, $i), 1), $e);
                $i++;
                if ($i == 1000) // Dengan Perulangan 1000 Kali
                        break;
        }
        // Sampai $key[1]=0
        while (gmp_strval($key[1]) != '0');
        // Hasil D = $key[0] 
        $d = $key[0];
        $vald = gmp_strval($d);

        $dp = gmp_strval(gmp_mod($d, $p - 1));
        $dq = gmp_strval(gmp_mod($d, $q - 1));
        for ($x = 1; $x < 100; $x++) {
                $qinv = gmp_mod($x * $q, $p);
                if ($qinv == 1)
                        break;
        }
        $qinv = $x;
}


if (isset($_POST['btnubah'])) {
        $n = $_POST['n'];
        $e = $_POST['e'];

        $no_faktur  = $_POST['nofaktur'];
        $date    = date_create($_POST['tanggal']);
        $tanggal = date_format($date, "d / M / Y");
        $client     = $_POST['client'];
        $alamat     = $_POST['alamat'];
        $uang       = $_POST['uang'];
        $keterangan = $_POST['keterangan'];

        $enkno_faktur  = enkripsi($no_faktur, $n, $e);
        $enktanggal    = enkripsi($tanggal, $n, $e);
        $enkclient     = enkripsi($client, $n, $e);
        $enkalamat     = enkripsi($alamat, $n, $e);
        $enkuang       = enkripsi($uang, $n, $e);
        $enkketerangan = enkripsi($keterangan, $n, $e);



        $ubah    = mysqli_query($link, "UPDATE datainvoice SET 
                                nofaktur= '$no_faktur',
                                tanggal = '$tanggal',
                                client = '$client',
                                alamat = '$alamat',
                                uang = '$uang',
                                keterangan = '$keterangan',
                                public_e = $e,
                                public_e = $n
                                WHERE nofaktur = '$no_faktur'
                                ");

        $enkripsiinvoice = mysqli_query($link, "INSERT INTO dataenkripsi VALUES (
                        '$enkno_faktur','$tanggal','$enkclient','$enkalamat','$enkuang','$enkketerangan')");

        if ($ubah) {
                echo "
                        <script>
                                alert('berhasil diubah');
                                window.location.href = '../index.php';
                        </script>
                        
                        ";
        }
}

if (isset($_POST['btntambah'])) {
        $n = $_POST['n'];
        $e = $_POST['e'];
        $d = $_POST['d'];


        $no_faktur  = $_POST['nofaktur'];
        $date    = date_create($_POST['tanggal']);
        $tanggal = date_format($date, "d/M/Y");
        $client     = $_POST['client'];
        $alamat     = $_POST['alamat'];
        $uang       = $_POST['uang'];
        $keterangan = $_POST['keterangan'];



        $enkno_faktur  = enkripsi($no_faktur, $n, $e);
        $enktanggal    = enkripsi($tanggal, $n, $e);
        $enkclient     = enkripsi($client, $n, $e);
        $enkalamat     = enkripsi($alamat, $n, $e);
        $enkuang       = enkripsi($uang, $n, $e);
        $enkketerangan = enkripsi($keterangan, $n, $e);

        $tambahinvoice = mysqli_query($link, "INSERT INTO datainvoice VALUES (
                        '$no_faktur','$tanggal','$client','$alamat','$uang','$keterangan','$e','$n')");

        $enkripsiinvoice = mysqli_query($link, "INSERT INTO dataenkripsi VALUES (
                        '$enkno_faktur','$tanggal','$enkclient','$enkalamat','$enkuang','$enkketerangan','$d')");


        if ($tambahinvoice && $enkripsiinvoice) {
                echo
                "<script>
                                alert('berhasil tambah');
                                window.location.href = 'forminvoice.php';
                        </script>";
        }
}

if (isset($_POST['dekrip'])) {
        $dp = $_POST['dp'];
        $dq = $_POST['dq'];
        $qinv = $_POST['qinv'];
        $p = $_POST['p'];
        $q = $_POST['q'];

        $plainno        = rtrim(dekripsi($_POST['chiperno'], $dp, $dq, $qinv, $p, $q));
        $plaintgl       = rtrim(dekripsi($_POST['chipertgl'], $dp, $dq, $qinv, $p, $q));
        $plainnama      = rtrim(dekripsi($_POST['chipernama'], $dp, $dq, $qinv, $p, $q));
        $plainalamat    = rtrim(dekripsi($_POST['chiperalamat'], $dp, $dq, $qinv, $p, $q));
        $plainuang      = rtrim(dekripsi($_POST['chiperuang'], $dp, $dq, $qinv, $p, $q));
        $plainket       = rtrim(dekripsi($_POST['chiperket'], $dp, $dq, $qinv, $p, $q));

        $baca   = (terbilang($plainuang));

        $x = $_POST['chiperno'];
        $verf = mysqli_query($link, "SELECT * FROM dataenkripsi WHERE enkfaktur = '$x'");
        if (mysqli_num_rows($verf) === 1) {
                $row = mysqli_fetch_array($verf);
                if ($dp == gmp_strval(gmp_mod($row[6], $p - 1)) && $dq == gmp_strval(gmp_mod($row[6], $q - 1))) {
                        echo "
                        <script>
                                window.location.href = '../plugin/phppdf/index.php?no=$plainno&nama=$plainnama&alamat=$plainalamat&uang=$plainuang&ket=$plainket&terbilang=$baca';
                        </script>
                        ";
                } else {
                        echo
                        "<script>
                    alert('Kode Verifikasi Salah');
                 </script>";
                }
        }

        // echo "
        // <script>
        //         window.location.href = '../plugin/phppdf/index.php?no=$plainno&nama=$plainnama&alamat=$plainalamat&uang=$plainuang&ket=$plainket&terbilang=$baca';
        // </script>";
}
