<?php
require_once '../app/models/User.php';

    if (isset($_POST['import']) AND !empty($_FILES)){
        if ($_FILES['file']['type'] === 'text/csv') {
            if ($_FILES['file']['size'] < 1024 * 1024) {
                $res = [];
                $template = [0 => 'UID', 1 => 'Name', 2 => 'Age', 3 => 'Email', 4 => 'Phone', 5 => 'Gender'];
                if (($file = fopen($_FILES['file']['tmp_name'], 'r')) !== false) {
                    while (($data = fgetcsv($file, 1000, ",")) !== false) {
                        $res[] = $data;
                    }
                    $result = array_diff($template, $res[0]);
                    if (!empty($result)){
                        echo "<p style='color: red'>Файл має неправильну структуру!!</p>";
                        echo "<a href='../index.php'> Import data  </a>";
                    }else{
                        addOrUpdateUsers($link,$res);
                        fclose($file);
                        echo "<p style='color: green'>Дані успішно завантажено!</p>";
                        echo "<a href='../index.php'> Import data  </a>";
                    }
                }
            }else{
                echo "<p style='color: red'>Файл повинен бути не більше чим 1 Мб. Дані не завантажено!!</p>";
                echo "<a href='../index.php'> Import data  </a>";
            }
        }else{
            echo "<p style='color: red'>Файл повинен бути формату .CSV. Дані не завантажено!!</p>";
            echo "<a href='../index.php'> Import data  </a>";
        }
    }


