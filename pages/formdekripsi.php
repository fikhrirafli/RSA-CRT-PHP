<?php
include("bangkit.php");
require_once('../database/init.php');

error_reporting(0);
ini_set('display_errors', 0);

$enkfaktur  = $_GET['enknofaktur'];
$ambil       = mysqli_query($link, "SELECT * FROM dataenkripsi WHERE enkfaktur = '$enkfaktur'");
$row         = mysqli_fetch_array($ambil);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ard Pro | Download Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugin/node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../plugin/DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../main.css">
    <!-- <link rel="stylesheet" type="text/css" href="../style.css">  -->

</head>


<body>
    <div>
        <div class="container backcolor" style="height: 100vh;">
            <div class="d-flex align-items-center justify-content-center" style="height: 400px; ">
                <div class=" colorwhite radius" style="width:800px;">
                    <div class="py-3 px-md-4 text-secondary">
                        <form method="POST">
                            <input type="hidden" name="chiperno" value="<?php echo $row[0]   ?> ">
                            <input type="hidden" name="chipertgl" value="<?php echo $row[1]   ?> ">
                            <input type="hidden" name="chipernama" value="<?php echo $row[2]   ?> ">
                            <input type="hidden" name="chiperalamat" value="<?php echo $row[3]   ?> ">
                            <input type="hidden" name="chiperuang" value="<?php echo $row[4]   ?> ">
                            <input type="hidden" name="chiperket" value="<?php echo $row[5]   ?> ">

                            <div class="mb-3 row ">
                                <h3>Download Invoice</h3>
                            </div>
                            <div class="mb-3 row ">
                                <label for="PrivateKey" class="col-sm-2 col-form-label">Kode Verifikasi</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="dp">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="dq">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="qinv">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="p">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="q">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="dekrip" class="btn btn-primary">Download Invoice</button>
                            </div>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<!-- <style>
    div {
        border-style: solid;
        border-width: 1px;
    }
</style> -->