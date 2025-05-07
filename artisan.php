<?php
require_once __DIR__ . '/vendor/autoload.php';

// Configuration de base
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Fonction pour exécuter les commandes Phinx
function runPhinxCommand($command)
{
    $phinxCommand = sprintf(
        'php vendor/bin/phinx %s --configuration=Database/Config/PhinxConfig.php --environment=development',
        $command
    );
    echo "Running: $phinxCommand\n";
    system($phinxCommand);
}

// Gestion des arguments
$argc = $_SERVER['argc'];
$argv = $_SERVER['argv'];

if ($argc < 2) {
    echo "Usage:\n";
    echo "php artisan.php migrate\n";
    echo "php artisan.php rollback\n";
    echo "php artisan.php status\n";
    echo "php artisan.php make:migration \"NomDeVotreMigration\"\n";
    exit(1);
}

$command = $argv[1];

switch ($command) {
    case 'migrate':
        runPhinxCommand('migrate');
        break;
    case 'rollback':
        runPhinxCommand('rollback');
        break;
    case 'status':
        runPhinxCommand('status');
        break;
    case 'make:migration':
        if ($argc < 3) {
            echo "Please provide a migration name\n";
            exit(1);
        }
        $migrationName = $argv[2];
        runPhinxCommand("create \"$migrationName\" --template=Database/Config/PhinxConfig.php");
        break;
    default:
        echo "Unknown command: $command\n";
        exit(1);
}
