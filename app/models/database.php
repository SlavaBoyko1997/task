<?php

$link = mysqli_connect('localhost','root','','task');

if (mysqli_connect_errno()) {
    echo 'Помилка підключення до бази даних ('. mysqli_connect_errno() .') :' . mysqli_connect_error();
    exit();
}