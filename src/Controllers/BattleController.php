<?php

namespace App\Controllers;

use App\Services\BattleService;
use Exception;

class BattleController
{

    /**
     * @var BattleService
     */
    private BattleService $battleService;

    public function __construct()
    {
        $this->battleService = new BattleService();
    }

    /**
     * @param string $arenaId
     * @return array
     * @throws Exception
     */
    public function startBattle(string $arenaId): array
    {
        if (!isset($_SESSION[$arenaId])) {
            throw new Exception("Arena not found");
        }
        $arena = $_SESSION[$arenaId];
        return $this->battleService->startBattle($arena);
    }
}

?>
