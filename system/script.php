<?
    $path = $_SERVER['DOCUMENT_ROOT'];
	require_once "$path/system/functions.php";

    if(isset($_POST['category'])){
         $category = $_POST['category'];
         
         if($category === "") {
            $books = getAllBooks();
         } else {
            $books = getBooksByCategory($category);
         }
         echo json_encode($books);


    }

