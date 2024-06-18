<?php

use PHPUnit\Framework\TestCase;
use App\Arena;
use App\Heroes\Archer;
use App\Heroes\Cavalry;
use App\Heroes\Swordsman;
use App\Battle;

final class BattleTest extends TestCase {

    /**
     * @return void
     */
    public function testStartBattle() {
        $arena = new Arena();
        $hero1 = new Archer('1');
        $hero2 = new Cavalry('2');
        $hero3 = new Swordsman('3');
        $arena->addHero($hero1);
        $arena->addHero($hero2);
        $arena->addHero($hero3);

        $battle = new Battle($arena);
        $history = $battle->start();

        $this->assertIsArray($history);
        $this->assertNotEmpty($history);
    }
}
?>
