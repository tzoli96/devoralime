<?php

namespace App\Services;

use App\HeroFactory;
use App\Arena;

class HeroService
{

    /**
     * @param int $count
     * @return Arena
     * @throws \Exception
     */
    public function createHeroes(int $count): Arena
    {
        $arena = new Arena();
        $types = ['archer', 'cavalry', 'swordsman'];

        for ($i = 0; $i < $count; $i++) {
            $type = $types[array_rand($types)];
            $hero = HeroFactory::createHero($type, uniqid());
            $arena->addHero($hero);
        }

        return $arena;
    }
}

?>
