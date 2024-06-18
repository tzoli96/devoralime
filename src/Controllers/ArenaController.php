<?php

namespace App\Controllers;

use App\Services\HeroService;

class ArenaController
{
    /**
     * @var HeroService
     */
    private HeroService $heroService;

    public function __construct()
    {
        $this->heroService = new HeroService();
    }

    /**
     * @param int $count
     * @return string
     */
    public function generateHeroes(int $count): string
    {
        $arena = $this->heroService->createHeroes($count);
        $arenaId = uniqid();
        $_SESSION[$arenaId] = $arena;
        return $arenaId;
    }
}

?>
