document.addEventListener('DOMContentLoaded', function () {
    var btnOpen = document.getElementById('btnOpenMenuAdmin');
    var btnClose = document.getElementById('btnCloseMenuAdmin');
    var navMobile = document.getElementById('navMobileAdmin');

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