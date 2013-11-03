<?php
$tiltle = 'Нова книга';
include './includes/header.php';

include '../business_logic/add_book_secret.php';
?>
<a href="index.php">Списък</a>

<form method="post" action="add_book.php">
    Име: <input type="text" name="book_name" />

    <div>Автори:<select name="authors[]" multiple style="width: 200px">
            <?php
            foreach ($authors as $row) {
                echo '<option value="' . $row['author_id'] . '">
                    ' . $row['author_name'] . '</option>';
            }
            ?>

        </select></div>
    <input type="submit" value="Добави" />    

</form>

<?php
include './includes/footer.php';
?>
