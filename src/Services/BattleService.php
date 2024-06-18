<?php

namespace App\Services;

use App\Arena;

class BattleService
{

    /**
     * @param Arena $arena
     * @return array
     */
    public function startBattle(Arena $arena): array
    {
        $arena->battle();
        return $arena->getHistory();
    }
}

?>
