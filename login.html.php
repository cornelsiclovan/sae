
<?php include_once 'includes/helpers.inc.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
<!--Bootstrap include files-->

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Administrator de bloc</title>
	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!--End bootstrap include files -->
	
	
	<head>
		<title>Log In</title>
		<meta http-equiv="content-type"
				content="text/html; charset=utf-8"/>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    	<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
				<a class="navbar-brand" href="">Administrator bloc</a>
				
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
				    <li class="navbar-brand" style="color:red; font-size:100%" id="failure"></li>
				    <li class="navbar-brand" style="color:green; font-size:100%" id="success"></li>
					<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Register <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr animated flipInX" role="menu">
                            <div class="col-lg-12">
                                <div class="text-center"><h3><b>Register</b></h3></div>
								<form id="ajax-register-form" action="?addform_admin" method="post" role="form" autocomplete="off">
									<div class="form-group">
										<input name="name_admin" id="name_admin" tabindex="1" class="form-control" placeholder="Name" required='required' value="">
									</div>
									<div class="form-group">
										<input type="email" name="email_admin" id="email_register_admin" tabindex="1" class="form-control" placeholder="Email Address" required='required'  value="" onBlur='checkAdminUser(this)'><span id='info_admin'></span>
									</div>
									<div class="form-group">
										<input type="password" name="password_admin" id="new_password_admin" tabindex="2" class="form-control" placeholder="Password" required='required' onChange="checkPasswordMatch()">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password_admin" id="confirm-password_admin" tabindex="2" class="form-control" placeholder="Confirm Password" onChange="checkPasswordMatch()" >
										<span id="divCheckPasswordMatch"></span>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-xs-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-info" value="Register Now">
											</div>
										</div>
									</div>
                                    <input type="hidden" class="hide" name="token" id="token" value="7c6f19960d63f53fcd05c3e0cbc434c0">
								</form>
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="http://phpoll.com/login" class="dropdown-toggle" data-toggle="dropdown">Log In <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                            <div class="col-lg-12">
                                <div class="text-center"><h3><b>Log In</b></h3></div>
                                <form id="ajax-login-form" action="" method="post" role="form" autocomplete="off">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="email" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value='' autocomplete="new-password">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-7">
                                                <input type="checkbox" tabindex="3" name="remember" id="remember">
                                                <label for="remember"> Remember Me</label>
                                            </div>
                                            <div class="col-xs-5 pull-right">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-info" value="Log In">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="etc-login-form" style="color:white; font-size:20px; ">
									<?php if (isset($loginError)&& isset($_POST['isAdmin'])): ?>
										<?php echo'<script>
											document.getElementById("success").innerHTML = "";
											document.getElementById("failure").innerHTML = "&nbsp;&#x2718; Userul nu este inregistrat sau parola este gresita";
										  </script>';
										?>
										<p><?php  ?></p>
									<?php endif; ?>
									</div>
									<input type="hidden" name="isAdmin" value="1">
									<input type="hidden" name="action" value="login"/>
									
                                    <input type="hidden" class="hide" name="token" id="token" value="a465a2791ae0bae853cf4bf485dbe1b6">
                                </form>
                            </div>
                        </ul>
                    </li>
                </ul>
			</div>
		</div>
		</nav>	
		<div class="container">
        
            <div class="col-md-4 col-md-offset-1">
                <div class="login-panel panel panel-red">
                    <div class="panel-heading">
                        <h3 class="panel-title">Logare proprietar</h3>
                    </div>
                    <div class="panel-body ">
                        <form action="" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" style="width:65%;" placeholder="Password" name="password" type="password"/>
									<input type="submit" style="float:right; margin-top:-35px; padding:5px 20px;" class="btn btn-lg btn-info" value="Log in"/>
								</div>
                                <div class="checkbox" style="float:left">
                                    <label>
                                        <a href="?proprietar_nou">Utilizator nou?</a>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="hidden" name="isProprietar" value="1">
								<input type="hidden" name="action" value="login"/>
								<p style="margin-top:10px; float:right">Ati uitat parola? <a href="#">click aici</a></p>
                            </fieldset>
                        </form>
                    </div>
				</div>
				<div class="etc-login-form" style="color:white; font-size:20px; ">
					<?php if (isset($loginError)&& isset($_POST['isProprietar'])): ?>
						<div class="alert alert-danger" role="alert">
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						  <span class="sr-only">Error:</span>
						 <?php echo htmlout($loginError);?>
						</div>
						
						<p><?php  ?></p>
					<?php endif; ?>
				</div>
				<?php if(isset($_GET['proprietar_nou'])):?>
                <div class="login-panel panel panel-secondary" style="margin-top:-10px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Proprietar nou? &nbsp; &#206;nregistreaz&#259;-te</h3>
                    </div>
                    <div class="panel-body">
                        <form action="?addproprietar" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nume complet" name="name_proprietar" type="nume" required='required' autofocus/>
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email_proprietar" type="email" autofocus onBlur="checkProprietarUser(this)"/>
									<span id="info_locatar"></span>
								</div>
                                <div class="form-group">
                                    <input class="form-control" id="newpass_locatar" placeholder="Parola" name="password_proprietar" type="password" onChange="checkPasswordMatchLocatar()">
								</div>
								<div class="form-group">
                                    <input class="form-control" id="newpass_confirm" placeholder="Confirmare parola" name="password_proprietar_conf" type="password" onChange="checkPasswordMatchLocatar()">
									<span class="registrationFormAlert" id="divCheckPasswordMatchLocatar"></span>
								</div>
                                <input id="submit-locatar" type="submit" style="padding:5px 20px;" class="btn btn-lg btn-secondary" value="&#206;nregistreaz&#259;-te"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
				<?php endif; ?>
			</div>
            <div class="col-md-4 col-md-offset-3">
                <div class="login-panel panel panel-yellow">
                    <div class="panel-heading">
                        <h3 class="panel-title">Logare locatar</h3>
                    </div>
                    <div class="panel-body ">
                        <form action="" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" style="width:65%;" placeholder="Password" name="password" type="password"/>
									<input type="submit" style="float:right; margin-top:-35px; padding:5px 20px;" class="btn btn-lg btn-info" value="Log in"/>
								</div>
                                <div class="checkbox" style="float:left">
                                    <label>
                                        <a href="?locatar_nou">Utilizator nou?</a>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="hidden" name="isLocatar" value="1">
								<input type="hidden" name="action" value="login"/>
								<p style="margin-top:10px; float:right">Ati uitat parola? <a href="#">click aici</a></p>
                            </fieldset>
                        </form>
                    </div>
				</div>
				<div class="etc-login-form" style="color:white; font-size:20px; ">
					<?php if (isset($loginError)&& isset($_POST['isLocatar'])):?>
						<div class="alert alert-danger" role="alert">
						  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						  <span class="sr-only">Error:</span>
						 <?php echo htmlout($loginError);?>
						</div>
						
						<p><?php  ?></p>
					<?php endif; ?>
				</div>
				<?php if(isset($_GET['locatar_nou'])):?>
                <div class="login-panel panel panel-secondary" style="margin-top:-10px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Locatar nou? &nbsp; &#206;nregistreaz&#259;-te</h3>
                    </div>
                    <div class="panel-body">
                        <form action="?addlocatar" method="post" autocomplete="off">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nume complet" name="name_locatar" type="nume" required='required' autofocus/>
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email_locatar" type="email" autofocus onBlur="checkLocatarUser(this)"/>
									<span id="info_locatar"></span>
								</div>
                                <div class="form-group">
                                    <input class="form-control" id="newpass_locatar" placeholder="Parola" name="password_locatar" type="password_locatar" onChange="checkPasswordMatchLocatar()">
								</div>
								<div class="form-group">
                                    <input class="form-control" id="newpass_confirm" placeholder="Confirmare parola" name="password_locatar_conf" type="password_locatar_conf" onChange="checkPasswordMatchLocatar()">
									<span class="registrationFormAlert" id="divCheckPasswordMatchLocatar"></span>
								</div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Cod administrator" name="cod_admin" type="cod_administrator">
								</div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Email administrator" name="email_admin" type="email_administrator">
								</div>
                                <input id="submit-locatar" type="submit" style="padding:5px 20px;" class="btn btn-lg btn-secondary" value="&#206;nregistreaz&#259;-te"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
				<?php endif; ?>
			</div>
		
		
            
		  
			<div class="col-md-4 col-md-offset-1">
			
			</div>
			
			
			<?php 
				if(!isset($_GET['proprietar_nou'])){
					echo "<div class='col-md-4 col-md-offset-1'>
							 
						  </div>";
				}
			?>
			
			<div class="col-md-4 col-md-offset-3">
			
			</div>
		</div>
	
		
	
	<!-- Formular vechi
		<h1>Introduceti datele de identificare</h1>
		<?php// if (isset($loginError)): ?>
			<p><?php //echo htmlout($loginError); ?></p>
		<?php //endif; ?>
		<form action="" method="post">
			<div>
				<label for="email">Email: </label><input type="text" name="email"
						id="email"/>
			</div>
			<div>
				<label for="password">Parola: </label> <input type="password"
						name="password" id="password"/>
			</div>
			<div>
				<input type="hidden" name="action" value="login"/>
				<p class="submit"><input type="submit" value="Log in"/></p>
			</div>
		</form>
		<p><a href="?add">Nu sunt inregistrat, doresc un cont nou.</a></p>
		<p><a href="/apps/">Inapoi la pagina principala</a></p>
	-->
	
	<!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	<script src="js/gradient.js"></script>
	
	<script>
		function O(obj)
		{
			if (typeof obj == 'object') return obj
				else return document.getElementById(obj)
		}
		
		function checkPasswordMatchLocatar()
		{
			var password = $("#newpass_locatar").val();
			var confirmPassword = $("#newpass_confirm").val();
			
			if (password != confirmPassword)
			{
				$("#divCheckPasswordMatchLocatar").html("<span style='color:red'>&nbsp;&#x2718; Parola neconfirmata</span>");
				$("#submit-locatar").prop("disabled", true);
			}
			else
			{
				$("#divCheckPasswordMatchLocatar").html("<span style='color:green'>&nbsp;&#x2714; Parola confirmata</span>");
				$("#submit-locatar").prop("disabled", false);
			}		
		}
		
		
		function checkPasswordMatch() {
			var password = $("#new_password_admin").val();
			var confirmPassword = $("#confirm-password_admin").val();

			if (password != confirmPassword)
			{
				$("#divCheckPasswordMatch").html("<span style='color:red'>&nbsp;&#x2718; Parola neconfirmata</span>");
				$("#register-submit").prop("disabled", true);
			}
			else
			{
				$("#divCheckPasswordMatch").html("<span style='color:green'>&nbsp;&#x2714; Parola confirmata</span>");
				$("#register-submit").prop("disabled", false);
			}		
		}
		
		function checkAdminUser(user)
		{
			
			
			if(user.value == ''){
				O('info_admin').innerHTML = ''
				return
			}
			
			params = "user=" + user.value
			request = new ajaxRequest()
			request.open("POST", "checkAdminUser.php", true)
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
			request.setRequestHeader("Content-length", params.length)
			request.setRequestHeader("Connection", "close")
			
			request.onreadystatechange = function()
			{
				if (this.readyState == 4)
					if (this.status == 200)
						if (this.responseText != null){
							O('info_admin').innerHTML = this.responseText
						}
			}
			request.send(params)
		}
		
		function checkLocatarUser(user)
		{
			if(user.value == ''){
				O('info_locatar').innerHTML = ''
				return
			}
			
			params = "user=" + user.value
			request = new ajaxRequest()
			request.open("POST", "checkLocatarUser.php", true)
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
			request.setRequestHeader("Content-length", params.length)
			request.setRequestHeader("Connection", "close")
			
			request.onreadystatechange = function()
			{
				if (this.readyState == 4)
					if (this.status == 200)
						if (this.responseText != null){
							O('info_locatar').innerHTML = this.responseText
						}
			}
			request.send(params)
			
		}
		
		function checkProprietarUser(user)
		{
			if(user.value == ''){
				O('info_locatar').innerHTML = ''
				return
			}
			
			params = "user=" + user.value
			request = new ajaxRequest()
			request.open("POST", "checkProprietarUser.php", true)
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
			request.setRequestHeader("Content-length", params.length)
			request.setRequestHeader("Connection", "close")
			
			request.onreadystatechange = function()
			{
				if (this.readyState == 4)
					if (this.status == 200)
						if (this.responseText != null){
							O('info_locatar').innerHTML = this.responseText
						}
			}
			request.send(params)
			
		}
		
		function ajaxRequest()
		{
			try { var request = new XMLHttpRequest() }
			catch(e1) {
				try { request = new ActiveXObject("Msxml2.XMLHTTP") }
				catch(e2) {
					try { request = new ActiveXObject("Microsoft.XMLHTTP") }
					catch(e3) {
						request = false
			} } }
			return request
		}
		
	</script>
	</body>
</html>
    