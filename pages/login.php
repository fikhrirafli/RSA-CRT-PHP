<?php
require_once ('../database/init.php');

if ( isset($_SESSION['login'])){
    header('location: forminvoice.php');
    exit;
 }


if(isset($_POST['login'])){
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    
    $login = mysqli_query($link, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($login) === 1) {
        $row = mysqli_fetch_array($login);
        if($row[3] == $password){
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $row[1];

            header("location: forminvoice.php");
            exit;
        }
    }else{
        echo
        "<script>
            alert('Usernam atau Password Salah');
         </script>" ;                     
    }
    
}

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ard Pro | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugin/node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../plugin/DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="../main.css"> 
    <link rel="stylesheet" type="text/css" href="../style.css"> 

 </head>


<body>
    <div class="container backcolor ">  
        <div class="d-flex align-items-center justify-content-center" style="height: 500px; ">  
            <div class=" colorwhite radius" style="width:400px;"  >
                <div class="py-3 px-md-4 text-secondary" > 
                    <form method="POST" >                    
                        <div class="mb-3 row text-center ">
                               <h3>Admin Login</h3>
                        </div>
                        <div class="mb-3">
                            <label for="Username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="Username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>   
            </div>
        </div>
    </div>

    <footer>
        <div class="container-fluid bg-dark align-middle pt-3" style="height : 160px;">
            <div class="mt-3 text-center teks">
                 &copy; 2022 Muhammad Fikhri Rafli</p>
            </div>
        </div>
    </footer>
</body>

</html>
