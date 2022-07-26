<?php
if (isset($_POST['export'])) {
    require_once '../app/models/User.php';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");

    fputcsv($output,array('UID','Name','Age','Email','Phone','Gender'));
    $result = getUsersToExport($link);

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
    fclose($output);
}