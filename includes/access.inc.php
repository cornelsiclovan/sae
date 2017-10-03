<?php
	
	function userIsLoggedIn()
	{
		if(isset($_POST['action']) and $_POST['action'] == 'login')
		{
			if(!isset($_POST['email']) or $_POST['email'] == '' or !isset($_POST['password']) or $_POST['password']=='')
			{
				$GLOBALS['loginError'] = 'Please fill in both fields';
				return FALSE;
			}	
	
			$email = mysqli_real_escape_string($_POST['email']);
			$password = mysqli_real_escape_string($_POST['password']);
			$password = md5($password.'dadb');
			
			if(databaseContainsAuthor($email, $password))
			{
				session_start();
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['loggedIn'] = TRUE;
				$_SESSION['expire'] = $_SESSION['start'] + (1 * 60);
				header('Location: index.php');//nedeed for successful logout
				return TRUE;
			}else
			{
				session_start();
				unset($_SESSION['email']);
				unset($_SESSION['password']);
				unset($_SESSION['loggedIn']);
				unset($_SESSION['email']);
				$GLOBALS['loginError'] = 'The specified email address or password was incorrect';
				return FALSE;
			}
			
			if(isset($_POST['action']) and $_POST['action'] == 'logout')
			{
				session_start();
				unset($_SESSION['email']);
				unset($_SESSION['password']);
				unset($_SESSION['loggedIn']);
				unset($_SESSION['email']);
				header('Location: '.$_POST['goto']);
				exit();
			}
		}
	
	}
	
	function databaseContainsAuthor($email, $password)
	{
		include 'db.inc.php';
		
		$sql = "SELECT COUNT(*) FROM users WHERE email = '$email' AND password = '$password'";
		$result = mysqli_query($link, $sql);
		if(mysqli_num_rows($result))
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
	