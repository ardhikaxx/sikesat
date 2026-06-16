<?php
$viewsPath = __DIR__ . '/resources/views';

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewsPath));
foreach ($iterator as $file) {
    if ($file->isFile()) {
        $name = $file->getFilename();
        if ($name === 'create.blade.php' || $name === 'edit.blade.php') {
            $path = $file->getRealPath();
            
            // Skip the user directory since it's already perfectly formatted
            if (strpos($path, 'views'.DIRECTORY_SEPARATOR.'user') !== false) {
                continue;
            }

            $content = file_get_contents($path);
            $originalContent = $content;

            // Extract the title and the route for the back button
            // Pattern: <h1 class="page-header__title">Tambah Pegawai</h1>
            //          <a href="{{ route('pegawai.index') }}" class="text-decoration-none">&larr; Kembali</a>
            
            $patternHeader = '/<div class="page-header__left">\s*<h1 class="page-header__title">(.*?)<\/h1>\s*<a href="(.*?)" class="text-decoration-none">&larr; Kembali<\/a>\s*<\/div>/s';
            
            $content = preg_replace_callback($patternHeader, function($matches) use ($name) {
                $titleText = $matches[1];
                $routeHref = $matches[2];
                $icon = ($name === 'create.blade.php') ? '<i class="fas fa-plus"></i> ' : '<i class="fas fa-edit"></i> ';
                
                // Add icon if not already present
                if (strpos($titleText, '<i class="fas') === false) {
                    $titleText = $icon . $titleText;
                }
                
                return '<div class="page-header__left">
        <h1 class="page-header__title">' . $titleText . '</h1>
    </div>
    <div class="page-header__actions">
        <a href="' . $routeHref . '" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>';
            }, $content);

            // Button replacement
            // Find <button type="submit" class="btn btn-primary">Simpan</button>
            // Also might have <i class="fas fa-save"></i> inside it.
            $btnPattern = '/<button type="submit" class="btn btn-primary".*?>.*?<\/button>/s';
            $content = preg_replace($btnPattern, '<hr>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save"></i> Simpan Data</button>
            </div>', $content);

            if ($content !== $originalContent) {
                file_put_contents($path, $content);
                echo "Updated: $path\n";
            }
        }
    }
}
echo "Done.\n";
