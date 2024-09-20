// Ativar links do menu
export default function initLinkMenu() {
  const links = document.querySelectorAll(".menu-superior a");
  const linksFdps = document.querySelector('[href="#"]')


  function ativarLink(link) {
    const url = location.href;
    const href = link.href;
    if (url.includes(href)) {
      link.classList.add("ativo");
    }
  }

  linksFdps.addEventListener("click", (event) => {
    event.preventDefault()
    console.log('teste')
  })

  links.forEach(ativarLink);
}