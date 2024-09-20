export default function initVerificarPorcentagem() {
  // Verifica a quantidade de agua que a pessoa bebeu e indica a porcentagem na tela de agua
  function verificaSeExiste() {
    const porcentagem = document.querySelector(".number h2");
    function verificarPorcentagem() {
      const porcentagemFormatada = parseInt(porcentagem.innerText);
      const box = document.querySelector(
        ".box .percent svg circle:nth-child(2)"
      );
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
    if (porcentagem) {
      verificarPorcentagem();
    }
  }
  verificaSeExiste();
}
