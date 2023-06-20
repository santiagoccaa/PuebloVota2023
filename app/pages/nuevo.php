<?php include "manejo/nuevoManejo.php"; ?>

<header class="contenido_formulario">
	<div class="container_crear">

		<div class="title_crear">
			
			<h2><i class="fa-regular fa-id-card"></i> Datos Personales</h2>
			<?php if (isset($mensaje)) { ?>
				<script>
					Swal.fire({
						position: 'top-end',
						icon:  '<?php echo $tipo; ?>',
						title: '<?php echo $mensaje; ?>',
						showConfirmButton: false,
						timer: 1500
					});
				</script>
			<?php } ?>
		</div>
		<div class="content_crear">
			<form method="POST" class="formulario_datos" id="formNuevo">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Nombre</span>
						<input type="text" name="nombre" required autocomplete="off" id="nombreInput">
					</div>
					<div class="input-box">
						<span class="details">Apellidos</span>
						<input type="text" name="apellidos" required autocomplete="off" id="apellidoInput">
					</div>
					<div class="input-box">
						<span class="details">Cedula</span>
						<input type="number" name="cedula" required autocomplete="off" id="cedulaInput">
					</div>
					<div class="input-box select-barrio">
						<span class="details">Barrio</span>
						<select name="barrio" id="mySelect" required>
							<option value=""></option>
							<option value="Barrio Abajo">Barrio Abajo</option>
							<option value="Barrio Arriba">Barrio Arriba</option>
							<option value="Buena Vista">Buena Vista</option>
							<option value="Buenos Aires">Buenos Aires</option>
							<option value="Campo Alegre">Campo Alegre</option>
							<option value="Candelilla">Candelilla</option>
							<option value="Centro">Centro</option>
							<option value="Coco Solo">Coco Solo</option>
							<option value="El Anzuello">El Anzuello</option>
							<option value="El Guanabano">El Guanabano</option>
							<option value="l Recreo">El Recreo</option>
							<option value="El Siete">El Siete</option>
							<option value="Javier Ciruajano Arjona">Javier Ciruajano Arjona</option>
							<option value="La Bajera">La Bajera</option>
							<option value="La Campesina 1">La Campesina 1</option>
							<option value="La Campesina 2">La Campesina 2</option>
							<option value="La Gloria">La Gloria</option>
							<option value="Las Mochilas">Las Mochilas</option>
							<option value="Loma del Viento">Loma del Viento</option>
							<option value="Los Postales">Los Portales</option>
							<option value="Marbella">Marbella</option>
							<option value="Mira Flores">Mira Flores</option>
							<option value="Nuevo Horizonte">Nuevo Horizonte</option>
							<option value="Nuevo Santander">Nuevo Santander</option>
							<option value="Ocho de Diciembre">Ocho de Diciembre</option>
							<option value="Paraíso">Paraíso</option>
							<option value="Plazaq de la Paz">Plaza de la Paz</option>
							<option value="Porvenir">Porvenir</option>
							<option value="San Abel">San Abel</option>
							<option value="San Carlos">San Carlos</option>
							<option value="San Francisco">San Francisco</option>
							<option value="San José">San José</option>
							<option value="San Miguel">San Miguel</option>
							<option value="San Rafael">San Rafael</option>
							<option value="Santa Ana">Santa Ana</option>
							<option value="Santa Lucia">Santa Lucia</option>
							<option value="Santander">Santander</option>
							<option value="Sucre">Sucre</option>
							<option value="Torices">Torices</option>
							<option value="Villa Alegría">Villa Alegría</option>
							<option value="Villa María">Villa María</option>
							<option value="Yuca Asa">Yuca Asa</option>
						</select>
					</div>

				</div>
				<div class="button_nuevo">
					<input type="submit" name="btn_insertar" value="Añadir Participante" id="bNuevo">
				</div>
			</form>
		</div>
	</div>
</header>
