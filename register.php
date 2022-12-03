<?php
include "userLib/user.php";
include 'imageLib/image.php';
include "adminLib/admin.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $userID=selectMaxID();
    $maxID=$userID['MAX(`userID`)']+1;
    $userName=$_POST['userName'];
    $userEmail=$_POST['userEmail'];
    $userPassword=$_POST['userPassword'];
    $userImage=$_FILES['userImage'];
    $UserImagePath=uploadImage($userImage,$maxID);
    $isRegister=checkRegister($userEmail);
    if($isRegister){
        echo "this email already exist";
    }else{
        if($maxID==1){
            $res=registerAdmin($userName,$userEmail, $userPassword,$UserImagePath);
    
        }else{
            $res=registerUser($userName,$userEmail, $userPassword,$UserImagePath);
    
        }
        
        if($res)
    {
        header("Location:login.php");
    }
    else
    {
        echo "failed";
    }
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
</head>

<body>
    <form style="margin: auto; width:300px;" action="" method="post" enctype="multipart/form-data">
        <input type="text" name="userName" placeholder="Name" id="">
        <input type="text" name="userEmail" placeholder="Email" id="">
        <input type="text" name="userPassword" placeholder="Password" id="">
        <label>image</label><input type="file" name="userImage" id="">
        <button type="submit">register</button>
    </form>
</body>

</html>