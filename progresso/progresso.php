<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/src/css/style.css">
  <title>WorkFlex - Progresso</title>
</head>

<body class="container">
  <?php
  // Inclui a conexão com o banco de dados
  include '../db_connection.php';

  // Query para buscar o status das tarefas
  $sql = "SELECT Status_Tarefa FROM Tarefa ORDER BY id_Tarefa ASC";
  $result = $conn->query($sql);
  
  // Array para armazenar os status das tarefas
  $statusTarefas = [];

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $statusTarefas[] = $row['Status_Tarefa'];
      }
  }
  ?>

  <header class="container">
    <nav class="nav-bg">
      <ul class="menu-superior">
        <a href="../primeira_pausa/aviso.html" class="menu-s-item font-2-s cor-p0">
          <li>Água</li>
        </a>
        <a href="../segunda_pausa/alongamento.html" class="menu-s-item font-2-s cor-p0">
          <li>Alongamento</li>
        </a>
        <a href="../primeira_pausa/meditacao.html" class="menu-s-item font-2-s cor-p0">
          <li>Meditação</li>
        </a>
      </ul>
    </nav>
    <nav class="gradient-sub-nav">
      <ul class="sub-nav">
        <a href="#">
          <li><img src="../public/assets/icons/seta-esquerda.svg" alt="" width="18" height="18"></li>
        </a>
        <a href="../primeira_pausa/alongamento.html">
          <li><img src="../public/assets/icons/seta-direita.svg" alt="" width="18" height="18"></li>
        </a>
      </ul>
    </nav>
  </header>
  
  <main class="container">
    <section class="progresso-container">
      <h1 class="progresso-titulo font-1-m-b">Progresso</h1>

      <?php
      // Pausa 1
      if ($statusTarefas[0] == 1) {
          echo '<div class="progresso-pausa" id="primeira">
                <img src="../public/assets/icons/lotus-flower-icon.svg" alt="">
                <div>
                  <span class="progresso-span font-1-s-b">1ª Pausa</span>
                  <div class="progresso-barra completo"></div>
                </div>
                <span class="progresso-porcentagem font-1-s-b">100%</span>
              </div>';
      } else {
          echo '<div class="progresso-pausa" id="primeira">
                <img src="../public/assets/icons/lotus-flower-icon.svg" alt="">
                <div>
                  <span class="progresso-span font-1-s-b">1ª Pausa</span>
                  <div class="progresso-barra incompleto"></div>
                </div>
                <span class="progresso-porcentagem font-1-s-b">0%</span>
              </div>';
      }

      // Pausa 2
      if ($statusTarefas[1] == 1) {
          echo '<div class="progresso-pausa" id="segunda">
                <img src="../public/assets/icons/alongamento-icon.svg" alt="">
                <div>
                  <span class="progresso-span font-1-s-b">2ª Pausa</span>
                  <div class="progresso-barra completo"></div>
                </div>
                <span class="progresso-porcentagem font-1-s-b">100%</span>
              </div>';
      } else {
          echo '<div class="progresso-pausa" id="segunda">
                <img src="../public/assets/icons/alongamento-icon.svg" alt="">
                <div>
                  <span class="progresso-span font-1-s-b">2ª Pausa</span>
                  <div class="progresso-barra incompleto"></div>
                </div>
                <span class="progresso-porcentagem font-1-s-b">0%</span>
              </div>';
      }

      // Pausa 3
      if ($statusTarefas[2] == 1) {
          echo '<div class="progresso-pausa" id="terceira">
                <img src="../public/assets/icons/lotus-flower-icon.svg" alt="">
                <div>
                  <span class="progresso-span font-1-s-b">3ª Pausa</span>
                  <div class="progresso-barra completo"></div>
                </div>
                <span class="progresso-porcentagem font-1-s-b">100%</span>
              </div>';
      } else {
          echo '<div class="progresso-pausa" id="terceira">
                <img src="../public/assets/icons/lotus-flower-icon.svg" alt="">
                <div>
                  <span class="progresso-span font-1-s-b">3ª Pausa</span>
                  <div class="progresso-barra incompleto"></div>
                </div>
                <span class="progresso-porcentagem font-1-s-b">0%</span>
              </div>';
      }

      // Pausa 4
      if ($statusTarefas[3] == 1) {
          echo '<div class="progresso-pausa" id="quarta">
                <img src="../public/assets/icons/alongamento-icon.svg" alt="">
                <div>
                  <span class="progresso-span font-1-s-b">4ª Pausa</span>
                  <div class="progresso-barra completo"></div>
                </div>
                <span class="progresso-porcentagem font-1-s-b">100%</span>
              </div>';
      } else {
          echo '<div class="progresso-pausa" id="quarta">
                <img src="../public/assets/icons/alongamento-icon.svg" alt="">
                <div>
                  <span class="progresso-span font-1-s-b">4ª Pausa</span>
                  <div class="progresso-barra incompleto"></div>
                </div>
                <span class="progresso-porcentagem font-1-s-b">0%</span>
              </div>';
      }
      ?>

    </section>
  </main>
  
  <footer class="container-global">
    <nav class="nav-bg nav-inferior">
      <ul class="menu-inferior">
        <a href="../user_infos/informacoes.html">
          <li><img src="../public/assets/icons/user-icon.svg" width="24" height="24"></li>
        </a>
        <a href="../progresso/progresso.php" width="24" height="24">
          <li><img src="../public/assets/icons/graphic-icon.svg" alt=""></li>
        </a>
        <a href="../agua/agua.html" width="24" height="24">
          <li><img src="../public/assets/icons/water-icon.svg" alt=""></li>
        </a>
        <a href="../index.html" width="24" height="24">
          <li><img src="../public/assets/icons/logout-icon.svg" alt=""></li>
        </a>
      </ul>
    </nav>
  </footer>
  
  <script type="module" src="../scripts/script.js"></script>
</body>

</html>
