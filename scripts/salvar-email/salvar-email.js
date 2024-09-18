export default function initSalvarEmail() {
  function salvarEmail() {
    let email = document.getElementById("email").value;
    localStorage.setItem("emailUsuario", email);
    return email;
  }
}
