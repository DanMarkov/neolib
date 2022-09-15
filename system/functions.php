<?

function connect(){
    session_start();
    $mysqli = new mysqli("127.0.0.1","root", "root", "library");
    if($mysqli->connect_errno != 0){
        return $mysqli->connect_error;
    } else {
        $mysqli->set_charset("utf8mb4");
    }
    return $mysqli;
}

function getAllBooks(){
    $mysqli = connect();
    $result = $mysqli->query("SELECT * FROM books");
    while($row = $result->fetch_assoc()){
        $books[] = $row;
    }
    return $books;
}

function getBooksByCategory($category) {
    $mysqli = connect();
    $result = $mysqli->query("SELECT * FROM books WHERE category = '$category'");
    while($row = $result->fetch_assoc()){
        $books[] = $row;
    }
    return $books;
}