<?php

session_start();
require_once('./lib/connect.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $query = "SELECT * FROM user WHERE Username='".$username."' AND Password='".md5($password)."' ";
    $result = $db->query($query);
    if(!$result){
        die ("Couldn't query the database: <br/>".$db->error);
    }else{
        if($result->num_rows>0){
            $row = $result->fetch_object();
            $_SESSION['status'] = "login";
            $_SESSION['username'] = $username;
            if($row->Role == "mahasiswa"){
                header('Location:./mahasiswa/dashboardMHS.php');
            } else if($row->Role == "dosen"){
                header('Location:./dosen/dashboardDSN.php');
            } else if($row->Role == "admin"){
                header('Location: ./admin/dashboardAdmin.php');	
            } else{
                header('Location:./departemen/dashboardDepartemen.php');
            }
            exit;
        }
    }
        $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript" type="text/javascript">
    window.history.forward();
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <title>Login</title>
	<link rel="shortcut icon" href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
</head>
<style>
    .main{
        height: 100vh;
    }
    .login-box{
        width: 600px;
        height: 500px;;  
        box-sizing: border-box;
        border-radius: 20px;
    }
</style>
<body class="" style="background-image: url(./assets/img/logo1.jpeg);background-repeat: no-repeat; background-size: 1600px 850px;">
    <div>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow" style="background-color:white;">
        <div class=" thumbnail" ><img class="rounded mx-auto d-block" style="width: 5cm; height: 5cm;"src="./assets/img/logo.png"/></div>
            <form method="POST" class="signin-form">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" id="password" required>
	                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div>
                 <button class="btn btn-primary form-control mt-3" type="submit" 
                    name="submit">Login</button>
                    <?php
                     ?>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>