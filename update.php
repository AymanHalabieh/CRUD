<?php

include 'userLib/user.php';
include 'imageLib/image.php';
session_start();



if(!empty($_SESSION['auth'])){
    $userID=$_GET['id'];
    $data=selectUser($userID);
}else{
    header("Location:login.php");
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $userName=$_POST['userName'];
    $userEmail=$_POST['userEmail'];
    $userPassword=$_POST['userPassword'];
    $userImage=$_FILES['userImage'];
   if($userImage['name']!=''){
    unlink($data['userImage']);
    $UserImagePath=uploadImage($userImage,$userID);
}else
   {
    $UserImagePath=$data['userImage'];
   }
    $res=updateUser($userID,$userName,$userEmail,$userPassword,$UserImagePath);
   if($res){
    header("Location:index.php");
   }else
   {
    header("Location:index.php");
   }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <style>
    input {
        width: 250px;
    }

    img {
        height: 206px;
        width: 275px;

    }
    </style>
</head>

<body>
    <form style="width:200px; text-align: center;" action="" method="post" enctype="multipart/form-data">
        <div style="display: flex; margin:auto;">
            <div><input type="text" name="userName" placeholder="Name" id="" value="<?=$data['userName']?>">
                <input type="text" name="userEmail" placeholder="Email" id="" value="<?=$data['userEmail']?>">
                <input type="text" name="userPassword" placeholder="Password" id="" value="<?=$data['userPassword']?>">
                <button type="submit">Update</button>
            </div>
            <div>
                <label>image</label>
                <img src="<?=$data['userImage']?>">
                <input type="file" name="userImage" id="">
            </div>

        </div>


    </form>
</body>

</html>