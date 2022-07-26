<?php
require_once '../app/models/User.php';

$usersIds = getUsers($link);
if (deleteUsers($link,$usersIds)) {
    echo "<p style='color: green'>База даних очищена!</p>";
    echo "<a href='../index.php'> Import data  </a>";
} else {
    echo "<p style='color: red'>База даних пуста!</p>";
    echo "<a href='../index.php'> Import data  </a>";
}
