<?php
require_once ('../database/init.php');
if ( !isset($_SESSION['login'])){
    header('location: login.php');
    exit;
 }

if(isset($_GET['nofaktur'])){
    $nofaktur   = $_GET['nofaktur'];
    $hapus      = mysqli_query($link,"DELETE FROM datainvoice WHERE nofaktur = '$nofaktur'");
    if($hapus){
        echo "
            <script>
                alert('berhasil hapus');
                window.location.href = '../index.php';
            </script>
        
        ";
    }
}

if(isset($_GET['enknofaktur'])){
    $enkfaktur   = $_GET['enknofaktur'];
    $hapusenkripsi    = mysqli_query($link,"DELETE FROM dataenkripsi WHERE enkfaktur = '$enkfaktur'");

    if($hapusenkripsi){
        echo "
            <script>
                alert('berhasil hapus');
                window.location.href = 'formenkripsi.php';
            </script>
        
        ";
    }
}
 

?>

