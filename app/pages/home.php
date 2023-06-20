<?php require "manejo/manejoHome.php"; ?>

<div class="information">
	<h2>Calendario Electoral</h2>
	<div class="stats">
		<div class="stat">
			<span class="number" id="total">
				<?php 
				$total_personas = miEquipo(); 
				print_r($total_personas['total']);  
				?>
			</span>
			<span class="label">Personas Inscritas en tu grupo</span>
		</div>
		<div class="stat">
			<span class="number">
				<?php 
				$dias = diasfaltantes(); 
				echo $dias;  
				?>
			</span>
			<span class="label">días Para las elecciones</span>
		</div>
		<div class="stat">
			<span class="number"><?php echo date('d-m-Y'); ?></span>
		</div>
	</div>
</div>	

<div class="information">
	<h2>Porcentaje de inscritos</h2>
	<div class="graph-container">
		<div class="cuadro_grafica">
			<canvas id="grafico-porcentaje" class="graph"></canvas>
		</div>
	</div>
	<span class="dato_publico" id="cantidadInscritos">
		<?php 
		
			$cant_inscritos = cantidadInscritos(); 
			print_r($cant_inscritos['inscritos']);
		?>
	</span>
</div>
