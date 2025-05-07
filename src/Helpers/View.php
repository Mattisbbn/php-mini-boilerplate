<?php
namespace Helpers;
use Config\Config;


class View {
    public static function render(string $view, array $data = []){
        extract($data);
        require_once Config::VIEW_DIR . "Pages/$view.php";
    }
}