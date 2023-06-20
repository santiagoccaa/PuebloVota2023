<?php 	
include_once "manejo/personas.php";
include_once "manejo/manejoLista.php";
?>

<div id="main-container">
	<div class="search-container">
		<select id="filterSelect">
			<option value="buscarNombre">Nombre</option>
			<option value="buscarCedula">Cedula</option>
		</select>
		<input type="text" id="searchInput" placeholder="Buscar..." autocomplete="off">
		<button id="searchButton">Buscar</button>
	</div>

	<div id="respuesta"></div>

	<table class="table-desktop">
		<tr>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Cedula</th>
			<th>Barrio</th>
			<th>Opciones</th>
		</tr>

		<tbody id="tbody-personas">

			<?php
			$items = getInscritos();

			foreach($items as $row){
				$persona = new Personas();
				$persona = $row;

				?>
				<tr id="fila-<?php echo $persona->cedula; ?>">
					<td><?php echo $persona->nombre; ?></td>
					<td><?php echo $persona->apellidos; ?></td>
					<td><?php echo $persona->cedula; ?></td>
					<td><?php echo $persona->barrio; ?></td>
					<td>
						<button 
						class="bEliminar" 
						data-cedula="<?php echo $persona->cedula; ?>" data-nombre="<?php echo $persona->nombre; ?>"
						>Eliminar </button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<div class="tabla-mobile">	
		<?php
		foreach($items as $row){
			$persona = new Personas();
			$persona = $row;

			?>
			<div class="fila fila-persona">	
				<div class="columna" id="fila-<?php echo $persona->cedula; ?>">
					<div class="header">Nombre</div>
					<div class="contenido"><?php echo $persona->nombre; ?></div>
				</div>
				<div class="columna" id="fila-<?php echo $persona->cedula; ?>">
					<div class="header">Apellidos</div>
					<div class="contenido"><?php echo $persona->apellidos; ?></div>
				</div>
				<div class="columna" id="fila-<?php echo $persona->cedula; ?>">
					<div class="header">Cedula</div>
					<div class="contenido"><?php echo $persona->cedula; ?></div>
				</div>
				<div class="columna" id="fila-<?php echo $persona->cedula; ?>">
					<div class="header">Barrio</div>
					<div class="contenido"><?php echo $persona->barrio; ?></div>
				</div>
				<div class="columna" id="fila-<?php echo $persona->cedula; ?>">
				</div>
			</div>
		<?php }
		?>
	</div>
</div>

<script>
	document.getElementById("searchButton").addEventListener("click", function() {
		var filterType = document.getElementById("filterSelect").value;
		var searchTerm = document.getElementById("searchInput").value;

		var rows = document.querySelectorAll("#tbody-personas tr");

		for (var i = 0; i < rows.length; i++) {
			var row = rows[i];
			var cedula = row.querySelector("td:nth-child(3)").textContent;
			var nombre = row.querySelector("td:nth-child(1)").textContent;

			if (filterType === "buscarNombre" && nombre.includes(searchTerm)) {
				row.style.display = "";
			} else if (filterType === "buscarCedula" && cedula.includes(searchTerm)) {
				row.style.display = "";
			} else {
				row.style.display = "none";
			}
		}
	});
</script>
<script>
const filterSelect = document.getElementById('filterSelect');
const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');
const filasPersona = document.getElementsByClassName('fila-persona');

searchButton.addEventListener('click', filtrar);

function filtrar() {
    const filtro = searchInput.value.toLowerCase();
    const filtroSelect = filterSelect.value;

    for (let i = 0; i < filasPersona.length; i++) {
        const fila = filasPersona[i];
        const contenido = fila.getElementsByClassName('contenido')[0].innerText.toLowerCase();

        if ((filtroSelect === 'buscarNombre' && contenido.includes(filtro)) ||
            (filtroSelect === 'buscarCedula' && fila.id.includes(filtro))) {
            fila.style.display = 'block';  // Muestra la fila si coincide con el filtro
        } else {
            fila.style.display = 'none';   // Oculta la fila si no coincide con el filtro
        }
    }
}
</script>