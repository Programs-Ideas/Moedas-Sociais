
function openNav() {
  
  /* Basicamente obtem a classe da div .mySidenav reduzindo a largura a 0 
    o mesmo para margem, os atributos do objeto que realizam isso são:
    style.width (largura)
    style.marginLeft (margem) */
  document.getElementById("mySideNav").style.width = "350px";
  document.body.style.marginLeft = "350px"; // Move o corpo da página para a direita
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)"; // Escurece o fundo

}

function closeNav() {
  /* Basicamente obtem a classe da div .mySidenav reduzindo a largura a 0 
    o mesmo para margem, os atributos do objeto que realizam isso são:
    style.width (largura)
    style.marginLeft (margem) */
  document.getElementById("mySideNav").style.width = "0";
  document.body.style.marginLeft = "0";
  document.body.style.backgroundColor = "rgb(220, 243, 234)"; // Restaura o fundo original
}
