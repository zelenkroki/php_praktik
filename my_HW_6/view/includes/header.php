<?php
include '../business_logic/functions_secret.php';
if (!$db) {
    echo 'No database';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?= $tiltle; ?></title>
    </head>
    <body>
