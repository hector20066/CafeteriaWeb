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

  var productName = document.getElementById('product_name');
  var slug = document.getElementById('slug');

  if (productName && slug) {
    productName.addEventListener('input', function () {
      slug.value = productName.value
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
    });
  }
});