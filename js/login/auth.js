document.addEventListener('DOMContentLoaded', function () {
  var formularioLogin = document.querySelector('.admin-login form');
 
  if (formularioLogin) {
    formularioLogin.addEventListener('submit', function (evento) {
      evento.preventDefault();
      window.location.href = '../admin/index.php';
    });
  }
});
 