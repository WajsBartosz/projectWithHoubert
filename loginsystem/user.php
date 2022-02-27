<!DOCTYPE HTML>
<?php session_start();
	if(isset($_SESSION['type']))
	header('location: ../main.php')
?>
<html>
	<head>
		<meta charset='utf-8'>
		<meta author='Hubert Przybyła'>
		<link rel='stylesheet' href='style.css'>
		<title> Logowanie </title>
	</head>

	<body>

		<div id='main'>
			<div id='change'> <div id='login'> Logowanie </div> <div id='registration'> Rejestracja </div> </div>
			<br><br><br>
			<div id='form'>
				<?php
				if(!isset($_SESSION['error']))
					$_SESSION['error']=0;

				if(!isset($_GET['registration'])){
				echo <<<k
				<form action='./scripts/login.php' method='post'>
					Login:<br>
					<input type='text' required name='login'><br><br>
					Hasło:<br>
					<input type='password' required name='password'><br><br><br>
					<input type='submit' value='zaloguj'>
				</form>
k;
				}
				else{
				echo <<<k
				<form action='./scripts/registration.php' method='post'>
				Login:<br>
				<input type='text' required name='login'><br><br>
				Hasło:<br><input required name='password' type='password'>
				<div id='rules'><img src='questionmark.png' onmouseover='showrules()' onmouseout='hiderules()'>
				<div id='test'><ul><li>min. 6 znaków</li><li>min. 1 wielka i mała litera</li><li>min. 1 cyfra</li><li>min. 1 znak specjalny</li></div></div>
				<br>Powtórz hasło:
				<br><input required type='password' name='password1'><br><br><br>
				<input type='submit' value='zarejestruj'></form>
				<script>
					var main = document.getElementById('main');
					main.style.height='605px';
					registration.style.borderBottom='solid';
					registration.style.borderBottomColor='rgb(60,60,60)';
					login.style.border='none';
				</script>
k;
				}
				?>
			</div>
			<div id='err' style='color:rgb(200,0,0);'>
				<?php
					if($_SESSION['error']==1)
						echo "Nie znaleziono użytkownika o takim loginie";
					else if ($_SESSION['error']==2)
						echo "Podano błędne hasło";
					else if ($_SESSION['error']==3)
						echo "Taki login już istnieje";
					else if ($_SESSION['error']==4)
						echo "Podane hasła nie są takie same";
					else if ($_SESSION['error']==5)
						echo "Hasło jest za krótkie";
					else if ($_SESSION['error']==6)
						echo "Hasło nie zawiera wszystkich wymaganych znaków";
					else if($_SESSION['error']==0){
						echo "<div style='height:29px;'></div>";
					}
						$_SESSION['error']=0;
				 ?>
			</div>
			<div id='back'><a href='../index.php'> < Powrót do strony Głównej </a></div>
		</div>

		<script>
			var form = document.getElementById('form');
			var login = document.getElementById('login');
			var registration = document.getElementById('registration');
			var main = document.getElementById('main');

			login.onmouseover = function(){
				login.style.backgroundColor='rgb(200,200,200)';
			}
			login.onmouseout = function(){
				login.style.backgroundColor='white';
			}

			registration.onmouseover = function(){
				registration.style.backgroundColor='rgb(200,200,200)';
			}
			registration.onmouseout = function(){
				registration.style.backgroundColor='white';
			}


			registration.onclick = function(){
				form.innerHTML="<form action='./scripts/registration.php' method='post'>Login:<br><input type='text' required name='login'><br><br>Hasło:<br><input required name='password' type='password'><div id='rules'><img src='questionmark.png' onmouseover='showrules()' onmouseout='hiderules()'><div id='test'><ul><li>min. 6 znaków</li><li>min. 1 wielka i mała litera</li><li>min. 1 cyfra</li><li>min. 1 znak specjalny</li></div></div><br>Powtórz hasło:<br><input required type='password' name='password1'><br><br><br><input type='submit' value='zarejestruj'></form><div style='height:29px;'></div>"
				main.style.height='605px';
				registration.style.borderBottom='solid';
				registration.style.borderBottomColor='rgb(60,60,60)';
				login.style.border='none';
				var test = document.getElementById('test');
				document.getElementById('err').innerHTML='';
			}

			login.onclick = function(){
				form.innerHTML="<form action='./scripts/login.php' method='post'>Login:<br><input required type='text' name='login'><br><br>Hasło:<br><input name='password' required type='password'><br><br><br><input type='submit' value='zaloguj'></form><div style='height:29px;'></div>"
				main.style.height='475px';
				login.style.borderBottom='solid';
				login.style.borderBottomColor='rgb(60,60,60)';
				registration.style.borderBottom='none';
				document.getElementById('err').innerHTML='';
			}

			function showrules(){
				test.style.visibility='visible';
			}

			function hiderules(){
				test.style.visibility='hidden';
			}

		</script>
	</body>
</html>
