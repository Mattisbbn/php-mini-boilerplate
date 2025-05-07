<?php 
namespace Helpers;
use Config\Config;
use Exception;

class Component{
    static function render(string $name, array $data = []){
        $file = Config::VIEW_DIR . "Components/$name.php";
     
        if (!file_exists($file)) {
            throw new Exception("Component file not found: $file");
        }
    
        extract($data);
        ob_start();
        require $file;
        echo ob_get_clean();
        return;
    }
}