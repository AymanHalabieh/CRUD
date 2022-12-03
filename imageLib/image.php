<?php
function uploadImage($userImage,$ID){
$tmp=$userImage['tmp_name'];
$type=$userImage['type'];
$ext=explode("/",$type);
$path="image/".$ID.".".$ext[1];
move_uploaded_file($tmp,$path);
return $path;
}