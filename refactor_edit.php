<?php

$dir = new RecursiveDirectoryIterator(__DIR__ . '/resources/views');
$iterator = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($iterator, '/^.+edit\.blade\.php$/i', RecursiveRegexIterator::GET_MATCH);

$count = 0;
foreach ($files as $file) {
    $filePath = $file[0];
    
    // Skip user edit because it's already refactored
    if (strpos($filePath, 'user\edit.blade.php') !== false || strpos($filePath, 'user/edit.blade.php') !== false) {
        continue;
    }

    $content = file_get_contents($filePath);

    // 1. Refactor page-header
    $patternHeader = '/<div class="page-header__left">\s*<h1 class="page-header__title">Edit\s*(.*?)<\/h1>\s*<a href="\{\{\s*route\(\'([^\']+)\'\)\s*\}\}" class="text-decoration-none">&larr; Kembali<\/a>\s*<\/div>/is';
    
    $replacementHeader = '<div class="page-header__left">
        <h1 class="page-header__title"><i class="fas fa-edit"></i> Edit $1</h1>
    </div>
    <div class="page-header__actions">
        <a href="{{ route(\'$2\') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>';

    $content = preg_replace($patternHeader, $replacementHeader, $content);

    // 2. Refactor submit button
    $patternButton = '/<button type="submit" class="btn btn-warning"><i class="fas fa-save"><\/i>\s*Update<\/button>/is';
    
    $replacementButton = '<hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Perubahan</button>
            </div>';
            
    $content = preg_replace($patternButton, $replacementButton, $content);

    // 3. Change fw-semibold to fw-bold in labels
    $content = preg_replace('/<label class="form-label fw-semibold">/', '<label class="form-label fw-bold">', $content);

    // Save changes
    file_put_contents($filePath, $content);
    $count++;
}

echo "Refactored $count edit files.\n";

// Also do create files just in case the user wants all forms to be consistent? The prompt said "semua halaman atau semua fitur edit" so maybe just edit files.
