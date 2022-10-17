<?php
// $hasil.=gmp_strval(gmp_mod(gmp_pow(ord($teks[$i]),$e),$n));
// $p = 43;
// $q = 47;
// $d = 773;

// $dp = gmp_strval(gmp_mod($d, $p - 1));
// $dq = gmp_strval(gmp_mod($d, $q - 1));
// for ($n = 1; $n < 100; $n++) {
//     $qinv = gmp_mod($n * $q, $p);
//     if ($qinv == 1)
//         break;
// }
// $qinv = $n;


// $teks = 79;

function dekripcrt($teks, $dp, $dq, $qinv, $p, $q)
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


// echo $dp . '<br>';
// echo $dq . '<br>';
// echo $qinv . '<br>';
// echo $m1 . '<br>';
// echo $m2 . '<br>';
// echo $h  . '<br>';
echo dekripcrt('79 68 1916 1680 488 854 330 854 79   ',17,37,11,43,47)  . '<br>';

?>