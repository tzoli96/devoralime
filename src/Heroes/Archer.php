<?php

namespace App\Heroes;

use App\Hero;
use App\Interfaces\HeroInterface;

class Archer extends Hero
{
    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        parent::__construct($id, 100);
    }

    /**
     * @param HeroInterface $opponent
     * @return string
     */
    public function attack(HeroInterface $opponent): string
    {
        $result = '';
        if ($opponent instanceof Cavalry) {
            $result = (rand(0, 100) < 40) ? 'opponent_dead' : 'opponent_defended';
        } elseif ($opponent instanceof Swordsman) {
            $result = 'opponent_dead';
        } elseif ($opponent instanceof Archer) {
            $result = 'opponent_dead';
        }
        return $result;
    }
}

?>
