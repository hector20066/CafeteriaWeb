document.addEventListener('DOMContentLoaded', function() {
    var btnOpen = document.getElementById('btnOpenMenu');
    var btnClose = document.getElementById('btnCloseMenu');
    var navMobile = document.getElementById('navMobile');

    if (btnOpen && navMobile) {
        btnOpen.addEventListener('click', function () {
            navMobile.classList.add('open');
        });
    }

    if (btnClose && navMobile) {
        btnClose.addEventListener('click', function () {
            navMobile.classList.remove('open');
        });
    }

    var btnIncrease = document.getElementById('btnIncrease');

    if (btnIncrease) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) {
                btnIncrease.classList.add('visible');
            } else {
                btnIncrease.classList.remove('visible');
            }
        });

        btnIncrease.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        })
    }
});
