<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
	
</head>

<body>
<div id="mid">
    <form action="signup.php" method="post">

                E-mail: <br>
                <input type="email" name="emailAdress"><br>
                <?php require_once 'signup_err1.php'?>
                Hasło: <br>
                <input type="password" name="pass1"><br>
                <?php require_once 'signup_err2.php'?>
                Powtórz hasło: <br>
                <input type="password" name="pass2"><br>
                <input type="submit" value="Zarejerstruj się" ><br>
    </form>
</div>

</body>
</html>