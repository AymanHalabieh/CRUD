<?php

function connection(){
    return mysqli_connect("localhost","root","","profileSystem");
}

 function registerUser($userName,$userEmail,$userPassword,$userImage){
    $conn=connection();
    mysqli_query($conn,"INSERT INTO `user` (userName,userEmail,userPassword,userImage) VALUES ('$userName','$userEmail','$userPassword','$userImage')");
    return mysqli_affected_rows($conn);
}


 function checkUser($userEmail,$userPassword){
    $conn=connection();
    $q=mysqli_query($conn,"SELECT * FROM user  WHERE userEmail='$userEmail' AND userPassword='$userPassword'");
    return mysqli_fetch_assoc($q);
}

function showAllUser(){
    $conn=connection();
    $q=mysqli_query($conn,"SELECT * FROM user");
    return mysqli_fetch_all($q,MYSQLI_ASSOC);
}

function deleteUser($userID){
    $conn=connection();
    mysqli_query($conn,"DELETE FROM user Where userID='$userID'");
    return mysqli_affected_rows($conn);
}


function checkRegister($userEmail){
    $conn=connection();
    $q=mysqli_query($conn,"SELECT userEmail FROM user  WHERE userEmail='$userEmail'");
    return mysqli_fetch_assoc($q);
}



 function selectUser($userID){
    $conn=connection();
    $q=mysqli_query($conn,"SELECT * FROM user  WHERE userID='$userID'");
    return mysqli_fetch_assoc($q);
}



function updateUser($userID,$userName,$userEmail,$userPassword,$UserImagePath){
    $conn=connection();
    mysqli_query($conn,"UPDATE user set `userName`='$userName',`userEmail`='$userEmail',`userPassword`='$userPassword',`userImage`='$UserImagePath' Where userID='$userID'");
    return mysqli_affected_rows($conn);
}


function selectMaxID(){
      $conn=connection();
    $q=mysqli_query($conn,"SELECT MAX(`userID`) FROM user");
    return mysqli_fetch_assoc($q);
}