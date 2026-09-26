<?php

$env = parse_ini_file(__DIR__ . '/../.env', false, INI_SCANNER_RAW);

foreach ($env as $key => $value) {
    $_ENV[$key] = trim($value);
}
