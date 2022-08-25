<?
    $path = $_SERVER['DOCUMENT_ROOT'];
	session_start();
?>

<?require_once "$path/private/head.php";?>

<body>
	 <div class="cont">
	 <? require_once "$path/private/header.php"; ?>
		<main class="main_start">
			<a href="/public/login.php"><div class="main_startPage__btn" id="logIn">Log in</div></a>
			<a href="/public/signup.php"><div class="main_startPage__btn" id="signUp">Sign up</div></a>
		</main>
	 <? require_once "$path/private/footer.php"; ?>
	 </div>
</body>
</html>
