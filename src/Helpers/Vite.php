<?php namespace Helpers;

use Config\Config;

class Vite {
    public static function assets(array $files) {
        foreach ($files as $file) {
            if ($_ENV["APP_ENV"] === "local") {
                if ($_ENV["APP_ENV"] === "local") {
                    echo '<script type="module" src="http://localhost:5173/@vite/client"></script>' . PHP_EOL;
                    // ...
                }
                $url = $_SERVER['VITE_DEV_SERVER'] . '/assets/' . $file;
                if (str_ends_with($file, '.css')) {
                    echo '<link rel="stylesheet" href="' . $url . '">' . PHP_EOL;
                } else if (str_ends_with($file, '.js')) {
                    echo '<script type="module" src="' . $url . '"></script>' . PHP_EOL;
                }
            } else {
                $manifestPath = '.vite/manifest.json';
                if (file_exists($manifestPath)) {
                    $manifest = json_decode(file_get_contents($manifestPath), true);
                    if (isset($manifest[$file])) {
                        $asset = $manifest[$file];
                        $filePath = $asset['file'];
                        
                        if (str_ends_with($file, '.css')) {
                            echo '<link rel="stylesheet" href="/' . $filePath . '">' . PHP_EOL;
                        } else if (str_ends_with($file, '.js')) {
                            echo '<script type="module" src="/' . $filePath . '"></script>' . PHP_EOL;
                        }
                        
                        if (isset($asset['css'])) {
                            foreach ($asset['css'] as $cssFile) {
                                echo '<link rel="stylesheet" href="/' . $cssFile . '">' . PHP_EOL;
                            }
                        }
                    }
                }
            }
        }
    }
}
