<?php
include "userLib/user.php";
session_start();
if(!empty($_SESSION['auth'])){
    header("Location:logout.php");
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $userEmail=$_POST['userEmail'];
    $userPassword=$_POST['userPassword'];
    $res=checkUser($userEmail,$userPassword);

    if(!empty($res)){
        $_SESSION['auth']=$res;
        header("Location:index.php");
    }
    
}
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <form style="margin: auto; width:300px;" action="" method="post" enctype="multipart/form-data">
        <input type="text" name="userEmail" placeholder="Email" id="">
        <input type="text" name="userPassword" placeholder="Password" id="">
        <button type="submit">login</button>
        <a href="register.php">register</a>
    </form>

</body>

</html>