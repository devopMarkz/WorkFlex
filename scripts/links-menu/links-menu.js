// Ativar links do menu
export default function initLinkMenu() {
  const links = document.querySelectorAll(".menu-superior a");

  function ativarLink(link) {
    const url = location.href;
    const href = link.href;
    if (url.includes(href)) {
      link.classList.add("ativo");
    }
  }

  links.forEach(ativarLink);
}
