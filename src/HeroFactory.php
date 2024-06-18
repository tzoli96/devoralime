<?php

namespace App;

use App\Heroes\Archer;
use App\Heroes\Cavalry;
use App\Heroes\Swordsman;

class HeroFactory
{

    /**
     * @param string $type
     * @param string $id
     * @return Hero
     * @throws \Exception
     */
    public static function createHero(string $type, string $id): Hero
    {
        return match ($type) {
            'archer' => new Archer($id),
            'cavalry' => new Cavalry($id),
            'swordsman' => new Swordsman($id),
            default => throw new \Exception("Invalid hero type"),
        };
    }
}

?>
