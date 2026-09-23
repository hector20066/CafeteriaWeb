document.addEventListener('DOMContentLoaded', function () {
  var btnAbrir = document.getElementById('btnAbrirMenuAdmin');
  var btnCerrar = document.getElementById('btnCerrarMenuAdmin');
  var navMovil = document.getElementById('navMovilAdmin');

  if (btnAbrir && navMovil) {
    btnAbrir.addEventListener('click', function () {
      navMovil.classList.add('abierto');
    });
  }

  if (btnCerrar && navMovil) {
    btnCerrar.addEventListener('click', function () {
      navMovil.classList.remove('abierto');
    });
  }
});