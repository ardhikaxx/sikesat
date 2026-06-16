<?php

$dir = new RecursiveDirectoryIterator(__DIR__ . '/resources/views');
$iterator = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($iterator, '/^.+show\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

$count = 0;
foreach ($files as $file) {
    $filePath = $file[0];

    $content = file_get_contents($filePath);

    // 1. Refactor page-header
    $patternHeader = '/<div class="page-header__left">\s*<h1 class="page-header__title">Detail\s*(.*?)<\/h1>\s*<a href="\{\{\s*route\(\'([^\']+)\'\)\s*\}\}" class="text-decoration-none">&larr; Kembali<\/a>\s*<\/div>/is';
    
    $replacementHeader = '<div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-eye"></i> Detail $1</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route(\'$2\') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>';

    $content = preg_replace($patternHeader, $replacementHeader, $content);

    // 2. Refactor table style (optional, make it look a bit cleaner without thick borders if table-bordered is used)
    $content = str_replace('<table class="table table-bordered">', '<table class="table table-striped mb-0">', $content);

    // Save changes
    file_put_contents($filePath, $content);
    $count++;
}

echo "Refactored $count show files.\n";
