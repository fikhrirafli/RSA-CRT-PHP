<?php
include ("bangkit.php");

if ( !isset($_SESSION['login'])){
    header('location: login.php');
    exit;
 }


?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ard Pro | Bangkit Kunci</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugin/node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../plugin/DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="../main.css"> 
    <link rel="stylesheet" type="text/css" href="../style.css"> 

 </head>


<body>
    <div class="container backcolor">  
        <div class="d-flex flex-row" style="height: 650px;">  
            <div class="d-flex flex-column flex-shrink-0 py-3 flex-grow-1 colorwhite radius mt-5" style="width: 100vh;" >
                 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 px-md-4 ">
                    <h1 class="h2 text-secondary">Buat Kunci</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="forminvoice.php">
                            <button class="btn btn-primary" type="button" >
                                <-  |  Kembali
                            </button>
                            </a>
                        </div>
                </div>
                <div class="py-3 px-md-4 text-secondary" > 
                    <form method="GET">
                    <div class="mb-3 row ">
                            <label for="p" class="col-sm-2 col-form-label">Nilai P</label>
                        <div class="col-sm-6">
                            <input type="text"  class="form-control" name="p">
                        </div>
                    </div>
                    <div class="mb-3 row ">
                            <label for="q" class="col-sm-2 col-form-label">Nilai Q</label>
                        <div class="col-sm-6">
                            <input type="text"  class="form-control" name="q">
                        </div>
                    </div>
                    <div class="mb-3 row ">
                            <label for="PublicKey" class="col-sm-2 col-form-label">Public Key</label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="form-control" name="e" value="<?php echo $e; ?>">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" readonly class="form-control" name="n" value="<?php echo $n; ?>">
                        </div>
                    </div>
                    <input type="hidden" readonly class="form-control" name="d" value="<?php echo $d; ?>">
                    <div class="mb-3 row ">
                            <label for="PrivateKey" class="col-sm-2 col-form-label">Private Key</label>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control" name="dp" value="<?php echo $dp; ?>">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control" name="dq"  value="<?php echo $dq; ?>">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" readonly class="form-control" name="qinv"  value="<?php echo $qinv; ?>">
                        </div>

                   
                    </div>

                    <div class="text-center mt-5">
                          <button type="submit" name="bangkit" class="btn btn-primary">Buat Kunci</button>
                          <button type="button"  onClick="refreshPage()" class="btn btn-outline-primary me-4">Ganti Kunci</button>
                          <?php
                          echo "<a href='forminvoice.php?e=$e&d=$d&n=$n'>
                                    <button type='button'  class='btn btn-primary ms-4'>Gunakan Kunci</button>
                               </a> " ;
                          ?> 
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

<script>

    function refreshPage(){
        window.location.reload();
    } 
</script>


<!-- <style>
    div {
        border-style: solid;
        border-width: 1px;
    }
</style> -->
