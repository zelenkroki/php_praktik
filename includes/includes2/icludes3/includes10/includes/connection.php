<?php
//username=root - Ne znam kak da si smenja potrebitelja za lokalno polzvane
//pass=qwerty - Tova ne e mojata pass, no ne znam kude ste tryabva da se postavja, a mojata mi e cenna zasega

$connection = mysqli_connect('localhost', 'user', 'qwerty', 'books');
if (!$connection) {
    echo 'Njama vruzka s bazata ot danni books.';
    exit;
}
mysqli_set_charset($connection, 'utf8');
?>
