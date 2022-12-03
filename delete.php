<?php
include "userLib/user.php";
session_start();
if(!empty($_SESSION['auth'])){
     $userID=$_GET['id'];
     $data=selectUser($userID);
    if($_SESSION['auth']['admin']){
        $res= deleteUser($userID);
        if($res){
            unlink($data['userImage']);
            header("Location:index.php");
        }else{
            echo "user not found";
        }
    }else
    {
        if($_SESSION['auth']['userID']==$userID)
        {
            $res= deleteUser($userID);
            if($res){
                unlink($data['userImage']);
                header("Location:logout.php");
        }else{
            echo "user not found";
        }
        }
        
    }
}else
{
    header("Location:login.php");
}

?>