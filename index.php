<?php
session_start();

if(isset($_SESSION['logged_id'])){
    header('Location: okey.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<?php
                         if(isset($_SESSION['bad_attemtp2'])){
                            echo '<div class="tope text-center"><p>Niepoprawny login lub hasło</p></div>';
                           
                            unset($_SESSION['bad_attemtp2']);
                           
                         }
                        ?>
    <form method="post" action="okey.php">
        <img src="icon.png"width="100vw" height="130vh">
    <div class="form_input-container">
        <label for="user"><b style="color: rgb(100, 100, 100);">User</b></label>
        <input type="text" name="login" id="log"/>
    </div>
    <div class="form_input-container">
        <label for="password"><b style="color: rgb(100, 100, 100);">Password</b></label>
        <input type="password" name="pass" id="pass">
    </div>
    <button><b>Login</b></button>
    </form>
</body>
</html>