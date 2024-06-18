<?php

use PHPUnit\Framework\TestCase;
use App\Arena;
use App\Heroes\Archer;
use App\Heroes\Cavalry;

final class ArenaTest extends TestCase
{

    /**
     * @return void
     */
    public function testAddHero()
    {
        $arena = new Arena();
        $hero = new Archer('1');
        $arena->addHero($hero);
        $this->assertCount(1, $arena->getHeroes());
    }

    /**
     * @return void
     */
    public function testGetHeroes()
    {
        $arena = new Arena();
        $hero1 = new Archer('1');
        $hero2 = new Cavalry('2');
        $arena->addHero($hero1);
        $arena->addHero($hero2);
        $heroes = $arena->getHeroes();
        $this->assertCount(2, $heroes);
        $this->assertInstanceOf(Archer::class, $heroes[0]);
        $this->assertInstanceOf(Cavalry::class, $heroes[1]);
    }

    /**
     * @return void
     */
    public function testAddHistory()
    {
        $arena = new Arena();
        $arena->addHistory('Hero1 attacked Hero2');
        $history = $arena->getHistory();
        $this->assertCount(1, $history);
        $this->assertEquals('Hero1 attacked Hero2', $history[0]);
    }
}

?>
