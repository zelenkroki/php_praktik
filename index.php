<?php
session_start();
$tiltle = 'Списък-каталог';
include 'includes/header.php';
?>
<h1>Библиотека: каталог; потребители; коментари</h1>
<a href="authors.php">Автори </a>
<a href="add_book.php">Въвеждане на нова книга</a>
<?php
$_SESSION['isLogged']=0;

if($_SESSION['isLogged']==true){
 echo '</br>Регистриран потребител: посещение</br>';
 echo 'Добавяне на коментар <a href="pisane_na_komentar.php"> GO==> </a></br> ';

 echo '<a href="destroy.php">Napuskane</a>';

}
else
{

if($_POST)
{
        $username=trim($_POST['username']);
        $pass=trim($_POST['pass']);
        if($username=='user' && $pass=='qwerty'){
         $_SESSION['isLogged']=true;
         header('Location: index.php');
         exit;
 }
 else{
  echo 'Грешни данни';
 }
}

?>
 <form method="POST">
 <div>Име:<input type="text" name="username" /></div>
 <div>Парола:<input type="password" name="pass" /></div>
 <div><input type="submit" value="Вход" /></div>
 </form>
<?php
}
$db = mysqli_connect('localhost', 'username', 'pass', 'books');
if (isset($_GET['author_id'])) {
    $author_id = (int) $_GET['author_id'];
    $q = mysqli_query($db, 'SELECT * FROM authors as a LEFT JOIN 
    books_authors as ba ON a.author_id=ba.author_id LEFT JOIN books as b
     ON b.book_id=ba.book_id WHERE a.author_id='.$author_id);
} else {
    $q = mysqli_query($db, 'SELECT * FROM books as b INNER JOIN 
    books_authors as ba ON b.book_id=ba.book_id INNER JOIN authors as a
     ON a.author_id=ba.author_id');
}


$result = array();
while ($row = mysqli_fetch_assoc($q)) {
    echo '<pre>'.print_r($row, true).'</pre>';
    $result[$row['book_id']]['book_title'] = $row['book_title'];
    $result[$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
}
echo '<table border="1"><tr><td>Книга</td><td>Автори</td></tr>';
foreach ($result as $row) {
    echo '<tr><td>' . $row['book_title'] . '</td>
        <td>';
    $ar = array();
    foreach ($row['authors'] as $k => $va) {
        $ar[] = '<a href="index.php?author_id=' . $k . '">' . $va . '</a>';
    }
    echo implode(' , ', $ar) . '</td></tr>';
}
echo '</table>';
 ?>

<?php
include './includes/footer.php';
?>
 
