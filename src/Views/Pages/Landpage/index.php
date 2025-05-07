<?php 
use Helpers\Component;
use Helpers\Vite;

Component::render('head');
Component::render('test');

Vite::assets([
    'js/main.js',
    'css/main.css',
]);

?>