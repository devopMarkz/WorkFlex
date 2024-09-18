// Ativar links do menu

const links = document.querySelectorAll(".menu-superior a");

function ativarLink(link) {
  const url = location.href;
  const href = link.href;
  if (url.includes(href)) {
    link.classList.add("ativo");
  }
}

links.forEach(ativarLink);

function verificarPorcentagem() {
  const porcentagem = document.querySelector(".number h2").innerText;
  const porcentagemFormatada = parseInt(porcentagem);
  const box = document.querySelector(".box .percent svg circle:nth-child(2)");
  if (porcentagemFormatada === 0) {
    box.style.strokeDashoffset = "calc(440 - (440 * 0) / 100)";
  } else if (porcentagemFormatada === 25) {
    box.style.strokeDashoffset = "calc(440 - (440 * 25) / 100)";
  } else if (porcentagemFormatada === 50) {
    box.style.strokeDashoffset = "calc(440 - (440 * 50) / 100)";
  } else if (porcentagemFormatada === 75) {
    box.style.strokeDashoffset = "calc(440 - (440 * 75) / 100)";
  } else if (porcentagemFormatada === 100) {
    box.style.strokeDashoffset = "calc(440 - (440 * 100) / 100)";
  }
}

verificarPorcentagem();
