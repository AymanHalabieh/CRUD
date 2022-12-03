<?php

session_start();
if(empty($_SESSION['auth'])){
    header("Location:login.php");
}
include "userLib/user.php";
$data=showAllUser();
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
    table th,
    table td {
        text-align: center;
        border: 1px solid black;
    }

    img {
        width: 90px;
        height: 75px;
    }
    </style>
</head>


<body>
    <a href="logout.php">logout</a>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th style=" width:300px;">Email</th>
            <th>Image</th>
            <th>upadate</th>
            <th>delete</th>
        </tr>
        <?php foreach($data as $user):?>
        <tr>

            <td><?=$user['userID']?></td>
            <td><?=$user['userName']?></td>
            <td><?=$user['userEmail']?></td>
            <td><img src="<?=$user['userImage']?>" alt="<?=$user['userImage']?>"></td>
            <td><?php
            if($_SESSION['auth']['admin']){
                echo "<a href=\"update.php?id=".$user['userID']."\">update</a>";
            }else{
                if($_SESSION['auth']['userID']==$user['userID'])
                echo "<a href=\"update.php?id=". $user['userID']."\">update</a>";
            }
            ?></td>
            <td><?php
            if($_SESSION['auth']['admin']){
                echo "<a href=\"delete.php?id=".$user['userID']."\">delete</a>";
            }else{
                if($_SESSION['auth']['userID']==$user['userID'])
                echo "<a href=\"delete.php?id=". $user['userID']."\">delete</a>";
            }
            ?></td>

        </tr>
        <?php endforeach;?>
    </table>
</body>

</html>