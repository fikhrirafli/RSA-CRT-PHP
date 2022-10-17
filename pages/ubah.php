<?php
require_once ('../database/init.php');
if ( !isset($_SESSION['login'])){
    header('location: login.php');
    exit;
 }

$nofaktur   = $_GET['nofaktur'];
$ambil      = mysqli_query($link,"SELECT * FROM datainvoice WHERE nofaktur = '$nofaktur'");
$row        = mysqli_fetch_array($ambil);

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ard Pro | Ubah Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugin/node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../plugin/DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="../main.css"> 
    <link rel="stylesheet" type="text/css" href="../style.css"> 

 </head>


<body>
    <div class="container backcolor">  
        <div class="d-flex flex-row" style="height: 650px;">  
            <div class="d-flex flex-column flex-shrink-0 py-3 flex-grow-1 colorwhite radius mt-5" >
                 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 px-md-4 ">
                    <h1 class="h2 text-secondary">Ubah Data Invoice</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="forminvoice.php">
                            <button class="btn btn-primary" type="button" >
                                <-  |  Kembali
                            </button>
                            </a>
                        </div>
                </div>
                <div class="py-3 px-md-4 text-secondary" > 
                    <form method="POST" action="bangkit.php">
                    <div class="mb-3 row ">
                            <label for="PublicKey" class="col-sm-2 col-form-label">Public Key</label>
                        <div class="col-sm-5">
                            <input type="text" readonly class="form-control" name="e" value="<?php echo $row[6]; ?>">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" readonly class="form-control" name="n" value="<?php echo $row[7];; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row ">
                            <label for="nofaktur" class="col-sm-2 col-form-label">No Faktur</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" name="nofaktur" value="<?php echo $row[0]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal" value="<?php echo $row[1]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                            <label for="client" class="col-sm-2 col-form-label">Nama Client</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="client" value="<?php echo $row[2]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" value="<?php echo $row[3]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                            <label for="uang" class="col-sm-2 col-form-label">Uang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="uang" value="<?php echo $row[4]; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Rincian Pembayaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keterangan" value="<?php echo $row[5]; ?>">
                        </div>
                    </div>

                    <div class="text-center mt-5">
                          <button type="submit" name="btnubah" class="btn btn-primary">Ubah Invoice</button>
                          <button type="clear" class="btn btn-outline-primary">Hapus</button>
                    </div>
                    </form>
                 </div>   
            </div>  
        </div>
    </div>

    <footer>
        <div class="container-fluid bg-dark align-middle pt-3" style="height : 80px;">
            <div class="mt-3 text-center teks">
                 &copy; 2022 Muhammad Fikhri Rafli</p>
            </div>
        </div>
    </footer>
</body>


</html>


    <script src="../plugin/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  

