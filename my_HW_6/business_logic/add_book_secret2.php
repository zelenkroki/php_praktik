<?php
$authors = getAuthors($db);
    if ($authors === false) {
        echo 'грешка';
        ///TODO        
    }
function nova_kniga($db){
if ($_POST) {

    $book_name = trim($_POST['book_name']);
    if (!isset($_POST['authors'])) {
        $_POST['authors'] = '';
    }
    $authors = $_POST['authors'];
    $er = array();
    if (mb_strlen($book_name) < 2) {
     $er[] = '<p>Невалидно име</p>';
     return $er;
    }
    if (!is_array($authors) || count($authors) == 0) {
     $er[] = '<p>Грешка</p>';
     return $er;
    }
    if (!isAuthorIdExists($db, $authors)) {
     $er[] = 'невалиден автор';
     return $er;
    }

    if (count($er) > 0) {
        foreach ($er as $v) {
            echo '<p>' . $v . '</p>';
        }
    } else {
        mysqli_query($db, 'INSERT INTO books (book_title) VALUES("' .
                mysqli_real_escape_string($db, $book_name) . '")');
        if (mysqli_error($db)) {
            $c= 'Error';
            exit;
            return $c;
        }
        $id = mysqli_insert_id($db);
        foreach ($authors as $authorId) {
            mysqli_query($db, 'INSERT INTO books_authors (book_id,author_id)
                VALUES (' . $id . ',' . $authorId . ')');
            if (mysqli_error($db)) {
               $c= 'Error';
                echo mysqli_error($db);
                exit;
                return $c;
            }
        }
       $c= 'Книгата е добавена';
        return $c;
    }
}
}
?>

