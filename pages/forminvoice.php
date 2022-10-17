<?php

require_once('../database/init.php');

if (!isset($_SESSION['login'])) {
    echo "<script> 
                alert('anda belum login'); 
                window.location.href = 'login.php';
            
             </script>";
}


error_reporting(0);
ini_set('display_errors', 0);

$e  = $_GET['e'];
$n  = $_GET['n'];
$d  = $_GET['d'];
?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ard Pro | Data Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugin/node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../plugin/DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="../style.css">

</head>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="icon-invoice" viewBox="0 0 16 16">
        <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
        <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
    </symbol>

    <symbol id="icon-enkripsi" viewBox="0 0 16 16">
        <path d="M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0zM7 7v1h2V7a1 1 0 0 0-2 0zM6 9.3v2.4c0 .042.02.107.105.175A.637.637 0 0 0 6.5 12h3a.64.64 0 0 0 .395-.125c.085-.068.105-.133.105-.175V9.3c0-.042-.02-.107-.105-.175A.637.637 0 0 0 9.5 9h-3a.637.637 0 0 0-.395.125C6.02 9.193 6 9.258 6 9.3z" />
        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
    </symbol>

    <symbol id="icon-admin" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
    </symbol>

    <symbol id="icon-logout" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
    </symbol>

</svg>

<body>
    <div class="container backcolor">
        <div class="d-flex flex-row" style="height: 650px;">
            <!------------Navbar------------------>
            <div class="d-flex flex-column flex-shrink-0 py-3 text-white bg-primary radius mt-5" style="width: 250px;">
                <div class="d-flex flex-column flex-shrink-0 p-3 fluid">
                    <a href="/" class="text-center">
                        <img src="../LOGO ARD.png" class="img-fluid" width="120px">
                        <use xlink:href="#bootstrap" /></img>
                    </a>
                </div>
                <ul class="nav nav-pills  flex-column mb-3 mt-3 ">
                    <li class="nav-item ">
                        <a class="nav-link active bg-warning py-3 rounded-pill align-middl fs-5 " aria-current="page" href="forminvoice.php">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="currentColor">
                                <use xlink:href="#icon-invoice" />
                            </svg>
                            DATA INVOICE
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link bg-primary active py-3 rounded-pill fs-5 sidebar" aria-current="page" href="formenkripsi.php">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="currentColor">
                                <use xlink:href="#icon-enkripsi" />
                            </svg>
                            DATA ENKRIPSI
                        </a>
                    </li>
                    <li class="nav-item px-3">
                        <hr>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link bg-primary active py-3 rounded-pill fs-5 sidebar" aria-current="page" href="#">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="currentColor">
                                <use xlink:href="#icon-admin" />
                            </svg>
                            <?php echo strtoupper($_SESSION['nama']); ?>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link bg-primary active py-3 rounded-pill fs-5 sidebar" aria-current="page" href="logout.php">
                            <svg class="bi pe-none me-2" width="25" height="25" fill="currentColor">
                                <use xlink:href="#icon-logout" />
                            </svg>
                            LOGOUT
                        </a>
                    </li>
                </ul>
            </div>
            <!------------Navbar------------------>

            <!------------Dashboard / Data Tables------------------>
            <div class="d-flex flex-column flex-shrink-0 py-3 flex-grow-1 colorwhite radius mt-5">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 px-md-4 ">
                    <h1 class="h2 text-secondary">Data Invoice</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            + | Tambah Invoice
                        </button>

                    </div>
                </div>

                <div class="py-3 px-md-4">
                    <table class="table table-borderless table-hover" id="invoice">
                        <thead class="text-secondary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No Faktur</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Uang</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col"> </th>

                            </tr>
                        </thead>
                        <tbody class="fw-bolder">


                            <?php
                            $query = "SELECT * FROM datainvoice";
                            $hasil = mysqli_query($link, "$query");
                            $no = 1;
                            while ($row = (mysqli_fetch_array($hasil))) {
                                echo "
                                
                                            <tr>
                                                <th scope='row'>$no</th>
                                                <td>$row[0]</td>
                                                <td>$row[1]</td>
                                                <td>$row[2]</td>
                                                <td>$row[3]</td>
                                                <td>$row[4]</td>
                                                <td>$row[5]</td>
                                                <td><a href='ubah.php?nofaktur=$row[0]'>
                                                        <button class='btn btn-outline-primary btn-sm' type='button'>Edit</button>
                                                    </a>
                                                    <a href='hapus.php?nofaktur=$row[0]'>
                                                        <button class='btn btn-primary btn-sm' type='button'>Hapus</button></td>
                                                    </a>
                                            </tr>
                                
                                ";
                                $no++;
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!------------Dashboard / Data Tables------------------>

        </div>
        <!--OFFCANVASS / FORM TAMBAH DATA INVOICE-->
        <div class="radius colorwhite offcanvas offcanvas-end text-secondary" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Tambah Invoice
                    <hr class="m-0 p-0 text-center">
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <!-- BANGKIT KUNCI -->


                <div class="text-start mb-2 ">
                    <h5>Buat Kunci </h5>
                </div>
                <form method="POST" action="bangkit.php">
                    <div class="row mb-1 ">
                        <label for="e" class="col-sm-3 col-form-label col-form-label-sm ps-4 pe-0">Public Key</label>
                        <div class="col-sm-3 pe-1">
                            <input type="text" class="form-control form-control-sm col-sm-3" name="e" value="<?php echo $e ?>" readonly>
                        </div>
                        <div class="col-sm-3 pe-1">
                            <input type="text" class="form-control form-control-sm col-sm-3" name="n" value="<?php echo $n ?>" readonly>
                        </div>

                        <input type="hidden" class="form-control form-control-sm col-sm-3" name="d" value="<?php echo $d ?>" readonly>


                    </div>



                    <div class="text-center ">
                        <a href="formbangkitkunci.php">
                            <button type="button" class="btn btn-primary mt-1">Bangkit Kunci</button>
                        </a>
                    </div>

                    <!--BANGKIT KUNCI-->
                    <hr>

                    <div class="text-start mb-2 ">
                        <h5>Buat Invoice</h5>
                    </div>
                    <!-- TAMBAH INVOICE-->
                    <div class="row g-3">

                        <div class="col-sm-5">
                            <label for="nofaktur" class="form-label col-form-label-sm">Nomor Faktur</label>
                            <input type="text" class="form-control form-control-sm" id="nofaktur" name="nofaktur">
                        </div>
                        <div class="col-sm-5">
                            <label for="tanggal" class="form-label col-form-label-sm">Tanggal</label>
                            <input type="date" class="form-control form-control-sm" name="tanggal">
                        </div>
                        <div class="col-sm-10 mt-1">
                            <label for="client" class="form-label  col-form-label-sm">Nama Client</label>
                            <input type="text" class="form-control form-control-sm" id="client" placeholder="Nama Client" name="client">
                        </div>
                        <div class="col-sm-12 mt-1">
                            <label for="alamat" class="form-label  col-form-label-sm">Alamat</label>
                            <input type="text" class="form-control form-control-sm" id="alamat" placeholder="Alamat" name="alamat">
                        </div>
                        <div class="col-sm-12 mt-1">
                            <label for="uang" class="form-label  col-form-label-sm">Uang</label>
                            <div class="row g-3">
                                <div class="col-sm-2 pe-0">
                                    <input type="text" class="form-control form-control-sm" placeholder="Rp" disabled>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-sm" id="uang" name="uang">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-1 fo">
                            <label for="keterangan" class="form-label  col-form-label-sm">Rincian Pembayaran</label>
                            <textarea class="form-control" placeholder="Rincian" id="keterangan" name="keterangan"></textarea>

                        </div>

                        <div class="text-center">
                            <button type="submit" name="btntambah" class="btn btn-primary">Tambah Invoice</button>
                            <button type="clear" class="btn btn-outline-primary">Hapus</button>
                        </div>
                    </div>
                    <!-- TAMBAH INVOICE-->

                </form>
            </div>
        </div>
        <!--OFFCANVASS / FORM TAMBAH DATA INVOICE-->


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
<script type="text/javascript" src="../plugin/DataTables/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#invoice").DataTable();
    });


    $("#invoice").dataTable({
        "pageLength": 6,
        "lengthChange": false

    });
</script>

