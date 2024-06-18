<?php

require 'vendor/autoload.php';

use App\Controllers\ArenaController;
use App\Controllers\BattleController;

session_start();

$action = $_GET['action'] ?? '';
$controller = $_GET['controller'] ?? '';

switch ($controller) {
    case 'arena':
        $arenaController = new ArenaController();
        if ($action === 'generate') {
            $count = $_GET['count'] ?? 10;
            echo json_encode(['arenaId' => $arenaController->generateHeroes((int)$count)]);
        }
        break;

    case 'battle':
        $battleController = new BattleController();
        if ($action === 'start') {
            $arenaId = $_GET['arenaId'] ?? '';
            try {
                echo json_encode($battleController->startBattle($arenaId));
            } catch (Exception $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}
?>
