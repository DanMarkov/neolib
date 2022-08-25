<?
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php";

    if(isset($_POST['send'])) {
        $query = $db -> query("SELECT * FROM `users` WHERE `login`='{$_POST['login']}'");
        if($query -> num_rows > 0) {
            $password = $query -> fetch_assoc()['password'];
            if(password_verify($_POST['password'],$password)) {
                $timeOutCookie = time() + 60 * 60;
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $_POST['login'];
                setcookie("login", $_POST['login'], $timeOutCookie);

                header("location: main.php");
            }
        } else {
            echo "Вас не существует...";
        }
    }

	require_once "$path/private/head.php";
?>

<body>
	 <div class="cont">
	 <? require_once "$path/private/header.php"; ?>
		<main class="main_start">
            <div>
                <h3>Log In</h3>
                <form action="" method="post">
                    <input type="text" name="login" placeholder="login" id="login">
                    <input type="password" name="password" placeholder="password" id="password">
                    <input type="submit" name="send" value="Log In">
                </form>
            </div>
		</main>
	 <? require_once "$path/private/footer.php"; ?>
	 </div>
</body>
</html>
