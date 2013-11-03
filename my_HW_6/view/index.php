<?php
$tiltle = 'Списък';
include './includes/header.php';
?>
<h1>Връзки</h1>

   <a href="authors.php">Автори</a>
<a href="add_book.php">Нова книга</a>
<h1>Каталог</h1>
<table border='1'>

   <tr><td>Книга</td><th>Автори</th></tr>
<?php

foreach ($result as $row) {
   echo '<tr><td>' . $row['book_title'] . '</td>     <td>';
    $ar = array();
    foreach ($row['authors'] as $k => $va) {
        $ar[] = '<a href="index.php?author_id=' . $k . '">' . $va . '</a>';
    }
    echo implode(' , ', $ar) . '</td></tr>';
}
  ?>
 
</table>

<?php
include './includes/footer.php';
?>
 
