// Obtener el total de personas
var spanElement = document.getElementById("total");
var totalteam = spanElement.textContent;

var spanElement = document.getElementById("cantidadInscritos");
var cantidadInscritos = spanElement.textContent;

var ctx1 = document.getElementById('grafico-porcentaje').getContext('2d');
var porcentaje = new Chart(ctx1, {

  type: 'pie',
  data: {
    labels: ['Mis Equipo', 'Total Inscritos'],
    datasets: [{
      data: [totalteam, cantidadInscritos],
      backgroundColor: [
        '#44FE2A',
        '#FE2A2A'
        ]
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    title: {
      display: true,
      text: 'Porcentaje de personas inscritas',
      fontSize: 20
    },
    legend: {
      position: 'right',
      labels: {
        fontSize: 16
      }
    },
    tooltips: {
      bodyFontSize: 16
    }
  }
});