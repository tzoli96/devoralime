<?php

namespace App\Heroes;

use App\Hero;
use App\Interfaces\HeroInterface;

class Cavalry extends Hero
{
    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        parent::__construct($id, 150);
    }

    /**
     * @param HeroInterface $opponent
     * @return string
     */
    public function attack(HeroInterface $opponent): string
    {
        $result = '';
        if ($opponent instanceof Cavalry) {
            $result = 'opponent_dead';
        } elseif ($opponent instanceof Swordsman) {
            $result = 'opponent_dead';
        } elseif ($opponent instanceof Archer) {
            $result = 'opponent_dead';
        }
        return $result;
    }
}

?>
