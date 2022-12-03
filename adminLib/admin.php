<?php


function registerAdmin($userName,$userEmail,$userPassword,$userImage){
    $conn=connection();
    mysqli_query($conn,"INSERT INTO `user` (userName,userEmail,userPassword,userImage,admin) VALUES ('$userName','$userEmail','$userPassword','$userImage',1)");
    return mysqli_affected_rows($conn);
}