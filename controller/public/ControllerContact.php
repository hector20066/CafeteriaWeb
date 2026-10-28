<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../view/contacto.html');
    exit();
}

$name = trim($_POST['name'] ?? '');
$address = trim($_POST['address'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $address === '' || $message === '') {
    exit('Por favor, completa todos los campos.');
}

$phone = '573137762626';
$whatsappMessage = "Hola, soy {$name}.\n" . "Mi dirección de entrega es: {$address}.\n\n" . $message;

$whatsappUrl = 'https://wa.me/' . $phone . '?text=' . urlencode($whatsappMessage);

header('Location: ' . $whatsappUrl);
exit();
