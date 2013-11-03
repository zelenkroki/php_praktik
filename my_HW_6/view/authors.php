<?php
$tiltle = 'Автори';
include './includes/header.php';
include '../business_logic/authors_secret.php';
?>
<a href="index.php">Списък</a>
<a href="add_book.php">Нова книга</a>
<form method="post" action="authors.php">
    Име: <input type="text" name="author_name" />
    <input type="submit" value="Добави нов автор" />    
</form>
<?php

echo proverki_authors($db);
$authors = getAuthors($db);
if ($authors===false) {
    echo 'Грешка';
}
?>
<table border='1'>
    <tr><th>Автор</th></tr>

    <?php
    foreach ($authors as $row) {
        echo '<tr><td>' . $row['author_name'] . '</td></tr>';
    }
    ?>


</table>

<?php
include './includes/footer.php';
?>
 
