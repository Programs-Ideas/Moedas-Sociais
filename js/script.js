

function openNav() {
    
  /* Basicamente obtem a classe da div .mySidenav reduzindo a largura a 0 
    o mesmo para margem, os atributos do objeto que realizam isso são:
    style.width (largura)
    style.marginLeft (margem) */
  document.querySelector("#mySidenav").style.width = "250px";
  document.querySelector("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  /* Basicamente obtem a classe da div .mySidenav reduzindo a largura a 0 
    o mesmo para margem, os atributos do objeto que realizam isso são:
    style.width (largura)
    style.marginLeft (margem) */
  document.querySelector("#mySidenav").style.width = "0";
  document.querySelector("#mySidenav").style.marginLeft = "0";
}
