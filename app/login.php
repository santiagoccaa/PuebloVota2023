<!DOCTYPE html>
<htm lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!------------- Fuente ----------------->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;700;800&display=swap" rel="stylesheet">
	<!-- ---------------------------- -->
	<script src="https://kit.fontawesome.com/6500a5bbfa.js" crossorigin="anonymous"></script>	
	<title>Login</title>
	<link rel="stylesheet" href=" <?=APP_URL; ?>assets/css/login.css">
</head>
<body>
	<section class="left-form">
		<img src="<?=APP_URL; ?>assets/img/login.png" alt="">
	</section>
	<section class="right-form">
		<form id="form-login" method="POST">
			<input type="hidden" name="action" value="login"/>
			<img src="<?=APP_URL; ?>assets/img/icono.png" alt="">
			<h2>Inicio de Sesion</h2>
			<h4 id="form-error"></h4>
			<label for="usuario">Usuario</label>
			<input type="text" autocomplete="off" name="username" id="username">
			<label for="password">Contraseña</label>
			<input type="password" autocomplete="off" name="password" id="password">
			<div class="check">
				<input type="checkbox">
				<span>recordar</span>
			</div>
			<input type="submit" value="Ingresar">
		</form>
	</section>
	<script src="<?=APP_URL; ?>assets/dist/jquery-3.6.0.min.js"></script>
	<script src="<?=APP_URL; ?>assets/js/login.js"></script>
</body>
</html>