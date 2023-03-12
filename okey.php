<?php
session_start();

require_once 'database.php';
if(!isset($_SESSION['logged_id'])){


    if(isset($_POST['login'])){

        $login=filter_input(INPUT_POST,'login');
        $password=filter_input(INPUT_POST,'pass');
       
        $userQuery2=$db->prepare('SELECT id,pass FROM admins WHERE login=:login');
        $userQuery2->bindValue(':login',$login,PDO::PARAM_STR);
        $userQuery2->execute();
        $user2 = $userQuery2->fetch();
        if($user2 && ($password==$user2['pass'])){
            $_SESSION['logged_id']=$user2['pass'];
            unset( $_SESSION['bad_attemtp2']);

        }else{
            $_SESSION['bad_attemtp2']=true;
            
            header('Location: index.php');
            exit();
        }
    }
    else{
        header('Location: index.php');
        exit();

    }
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
 <p>zalogowano</p> <br>
 <div class="tope"><a href="logout.php"> <p>Wyloguj</p></a>   </div>      
</body>
</html>