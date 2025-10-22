let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", () => {
  sidebar.classList.toggle("open");
  menuBtnChange();//chamando a função(opcional)
});


searchBtn.addEventListener("click", () => { //abrir a sidebar ao clicar no botão de pesquisa
  sidebar.classList.toggle("open");
  menuBtnChange(); //chamando a função(opcional)
});

// Função para alterar o botão(opcional)
function menuBtnChange() {
  if (sidebar.classList.contains("open")) {
    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//alterando a classe dos ícones
  } else {
    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");//alterando a classe dos ícones
  }
}

function errorConstruction() {
  Swal.fire(
    'Ops',
    'Em desenvolvimento!',
    'warning'
  )
}