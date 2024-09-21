document.addEventListener('DOMContentLoaded', function () {
    function updateCircle(consumo) {
      const metaDiaria = 2450; // Meta diária de 2450ml
      const percentage = Math.min((consumo / metaDiaria) * 100, 100);
      const circle = document.getElementById('progress-circle');
      const percentText = document.getElementById('percent-value');
  
      percentText.innerHTML = Math.round(percentage) + '<span>%</span>';
  
      const radius = circle.r.baseVal.value;
      const circumference = 2 * Math.PI * radius;
      const offset = circumference - (percentage / 100) * circumference;
      circle.style.strokeDasharray = `${circumference}`;
      circle.style.strokeDashoffset = `${offset}`;
    }
  
    function fetchConsumo() {
      fetch('get_consumo.php')
        .then(response => response.json())
        .then(data => {
          const consumo = data.consumo || 0;
          updateCircle(consumo);
        })
        .catch(error => console.error('Erro ao buscar o consumo de água:', error));
    }
  
    fetchConsumo();
  });
  