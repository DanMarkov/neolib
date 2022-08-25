<?
    $path = $_SERVER['DOCUMENT_ROOT'];
    require_once "$path/system/db.php";

    if(isset($_POST['send'])) {

        $error=[];

        if($_POST['login']==="") {
            $error[]="Введите логин";
        } else {
            $reg = "/^[A-Za-z0-9А-ЯЁ]+$/ui";

            $result = preg_match($reg, $_POST['login']);

            if($result==false) {
                $error[]="Нужно смотреть шаблон!";
            }
        }



        if($_POST['password']==="") {
            $error[]="Введите пароль!";
        }

        if($_POST['password']!==$_POST['password2']) {
            $error[]="Пароли не совпадают!";
        }

        if($_POST['name']==="") {
            $error[]="Введите имя!";
        } else {
            $reg = "/^[A-Za-z0-9А-ЯЁ]+$/ui";

            $result = preg_match($reg, $_POST['name']);

            if($result==false) {
                $error[]="Нужно смотреть шаблон!";
            }
        }

        if($_POST['surname']==="") {
            $error[]="Введите фамилию!";
        } else {
            $reg = "/^[A-Za-z0-9А-ЯЁ]+$/ui";

            $result = preg_match($reg, $_POST['surname']);

            if($result==false) {
                $error[]="Нужно смотреть шаблон!";
            }
        }

        if($_POST['birthday']==="") {
            $error[]="Введите дату рождения!";
        }

        
        if($_POST['email']==="") {
            $error[]="Введите email!";
        }

        
        if(empty($error)) {
            $_POST['password'] = password_hash($_POST['password'], false); 
            $db -> query("INSERT INTO `users` (`login`, `password`, `name`, `surname`, `date`, `email`) VALUES('{$_POST['login']}', '{$_POST['password']}', '{$_POST['name']}', '{$_POST['surname']}', '{$_POST['birthday']}', '{$_POST['email']}')");
    
            header("Location: login.php");
        } else {
            echo $error[0];
        }

    } 

	require_once "$path/private/head.php";
?>

<body>
	 <div class="cont">
	 <? require_once "$path/private/header.php"; ?>
		<main class="main_start">
            <div>
                <h3>Sign Up</h3>
                <form action="" id="signup" method="post">
                    <input type="text" name="login" placeholder="login" id="login">
                    <input type="password" name="password" placeholder="password" id="password">
                    <input type="password" name="password2" placeholder="password2" id="password2">
                    <input type="text" name="name" placeholder="your name" id="name">
                    <input type="text" name="surname" placeholder="your surname" id="surname">
                    <input type="date" id="birthday" name="birthday">
                    <input type="email" name="email" id="email" placeholder="your email">
                    <input type="submit" name="send" value="Sign Up">
                </form>
            </div>
		</main>
	 <? require_once "$path/private/footer.php"; ?>
	 </div>

     <script>
		login.oninput = ()=> {
			if(login.value.length<3){
				console.log("Логин должен быть от 3 символов!");
				login.style.border = "1px solid red";

			}
			else {
				login.style.border = "1px solid green";
			}
		}
		password.oninput = ()=> {
			if(password.value.length<3){
				console.log("Пароль должен быть от 3 символов!");
				password.style.border = "1px solid red";

			}
			else {
				password.style.border = "1px solid green";
			}
		}
		password2.oninput = ()=> {
			if(password.value!==password2.value){
				password2.style.border = "1px solid red";
			}
			else {
				password2.style.border = "1px solid green";
			}
		}

		formSignup.onsubmit = () => {
			if(login.value.length<3){
				console.log("Логин должен быть от 3 символов!");
				login.style.border = "1px solid red";

			}
			if(password.value.length<3){
				console.log("Пароль должен быть от 3 символов!");
				return false;
			}
			if(password.value != password2.value){
				console.log("Пароли не совпадают");
				return false;
			}
			
		}
     </script>
</body>
</html>
