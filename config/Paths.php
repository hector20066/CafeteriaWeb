<?php

$projectDirectory = str_replace('\\', '/', realpath(__DIR__ . '/..'));
$documentRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? $projectDirectory));

$projectDirectory = rtrim($projectDirectory, '/');
$documentRoot = rtrim($documentRoot, '/');

if ($projectDirectory !== $documentRoot && str_starts_with($projectDirectory, $documentRoot . '/')) {
    $baseUrl = substr($projectDirectory, strlen($documentRoot));
} else {
    $baseUrl = '';
}

define('BASE_URL', rtrim($baseUrl, '/') . '/');

function url(string $path): string
{
    return BASE_URL . ltrim($path, '/');
}