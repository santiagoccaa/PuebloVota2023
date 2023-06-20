<?php
include_once "conexion.php";

$database = Database::getInstance();
$pdo = $database->getConnection();

$id_postulado = $_SESSION['nombre'];

$query = $pdo->prepare("SELECT barrio, COUNT(*) AS total_registros, SUM(CASE WHEN id_postulado = :id_postulado THEN 1 ELSE 0 END) AS total_registros_parametro FROM inscritos GROUP BY barrio");
$query->bindParam(':id_postulado', $id_postulado);
$query->execute();

$data_barrios = array(
    array('Barrio', 'Inscritos', 'Mi Grupo')
);

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $barrio = $row['barrio'];
    $inscritos = intval($row['total_registros']); 
    $suma_id_postulado = intval($row['total_registros_parametro']);
    $data_barrios[] = array($barrio, $inscritos, $suma_id_postulado);
}

$barrios_graficas = array_chunk(array_slice($data_barrios, 1), 7);

for ($i = 0; $i < 6; $i++) {
    echo '<div id="grafica' . ($i + 1) . '" class="grafica"></div>';

    echo '
    <script type="text/javascript">
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart' . ($i + 1) . ');

        function drawChart' . ($i + 1) . '() {
            var data' . ($i + 1) . ' = google.visualization.arrayToDataTable(' . json_encode(array_merge(array(array('Barrio', 'Inscritos', 'Mi Grupo')), $barrios_graficas[$i])) . ');

            var options' . ($i + 1) . ' = {
                title: "Gráfica ' . ($i + 1) . '",
                chartArea: { width: "75%", height: "75%" },
                colors: ["#FF2337", "#00DCFF"],
                backgroundColor: { fill: "transparent" },
                hAxis: {
                    textStyle: {
                        color: "#333333",
                        fontSize: 12
                    },
                    titleTextStyle: {
                        color: "#666666",
                        fontSize: 14
                    }
                },
                vAxis: {
                    textStyle: {
                        color: "#000000",
                        fontSize: 15
                    },
                    titleTextStyle: {
                        color: "#666666",
                        fontSize: 14
                    }
                }
            };

            var chart' . ($i + 1) . ' = new google.visualization.BarChart(document.getElementById("grafica' . ($i + 1) . '"));
            chart' . ($i + 1) . '.draw(data' . ($i + 1) . ', options' . ($i + 1) . ');
        }

        $(window).resize(function() {
            drawChart' . ($i + 1) . '();
        });
    </script>';
}
?>