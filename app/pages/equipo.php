<?php 

require "manejo/manejoTeam.php";
?>
<div class="ramas">
	<div class="box-conjunto">
		<div class="card">
			<i class="fa-solid fa-crown"></i>
			<h5>Personal Alcalde</h5>
			<h5>
			<?php 
				$total_personas = miEquipo(); 
				print_r($total_personas['total']);  
			?>	
			</h5>
		</div>
	</div>
</div>

<div class="box-conjunto">
	<?php 
	if ($query->rowCount() > 0) {
		foreach ($result as $row) {
			$id_postulado = $row["id_postulado"];
			$cantidad = $row["cantidad"];

        // Generar la carta con los datos
			echo '<div class="card">';
			echo '<i class="otros fa-solid fa-people-line"></i>';
			echo '<h5>' . $id_postulado . '</h5>';
			echo '<h5>' . $cantidad . '</h5>';
			echo '<div class="pra product" data-name="p-6">';
			echo '</div>';
			echo '</div>';
		}
	}

	?>
</div>
</div>	
