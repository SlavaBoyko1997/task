<?php
require_once 'database.php';

function getUsers($link)
{
    $sql = "SELECT * FROM users";
    return mysqli_query($link,$sql)->fetch_all(1);
}

function deleteUsers($link,$idUser)
{
    if (!empty($idUser)) {
        foreach ($idUser as $id){
            $sql = "DELETE FROM users WHERE UID = $id[UID]";
            mysqli_query($link,$sql);
        }
        return true;
    }
    else {
        return false;
    }
}

function addOrUpdateUsers($link,$res)
{
    for ($i = 1; $i <= count($res); $i++) {
        if (!empty($res[$i])) {
            $sqlInsert = "Insert into users (UID, name, age, Email, Phone, Gender) values (" . $res[$i][0] . ", '" . $res[$i][1] . "', " . $res[$i][2] . ", '" . $res[$i][3] . "', " . $res[$i][4] . ", '" . $res[$i][5] . "')";
            $result = mysqli_query($link, $sqlInsert); //return 0/1
        }
        if (empty($result)) {
            if (!empty($res[$i])){
                $sqlUpdate = "UPDATE users SET name  = '".$res[$i][1]."', age = ".$res[$i][2].", Email  = '".$res[$i][3]."', Phone  = ".$res[$i][4].", Gender = '".$res[$i][5]."' WHERE UID = ".$res[$i][0].";";
                $result = mysqli_query($link, $sqlUpdate);
            }
        }
    }
}

function getUsersToExport($link)
{
    $sql = "SELECT * FROM users";
    return mysqli_query($link,$sql) ;
}


function sortUsers($link,$sort,$column)
{
    $sql = "SELECT * FROM users ORDER BY `".$column."` $sort ";
    return mysqli_query($link,$sql);
}