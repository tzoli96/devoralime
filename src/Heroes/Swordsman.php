<?php

namespace App\Heroes;

use App\Hero;
use App\Interfaces\HeroInterface;

class Swordsman extends Hero
{

    /**
     * @param string $id
     */
    public function __construct(string $id)
    {
        parent::__construct($id, 120);
    }

    /**
     * @param HeroInterface $opponent
     * @return string
     */
    public function attack(HeroInterface $opponent): string
    {
        $result = '';
        if ($opponent instanceof Cavalry) {
            $result = 'nothing';
        } elseif ($opponent instanceof Swordsman) {
            $result = 'opponent_dead';
        } elseif ($opponent instanceof Archer) {
            $result = 'opponent_dead';
        }
        return $result;
    }
}

?>
