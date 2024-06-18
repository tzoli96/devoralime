<?php

use PHPUnit\Framework\TestCase;
use App\Heroes\Archer;
use App\Heroes\Cavalry;
use App\Heroes\Swordsman;

final class HeroTest extends TestCase
{

    /**
     * @return void
     */
    public function testArcherAttack()
    {
        $archer = new Archer('1');
        $cavalry = new Cavalry('2');
        $swordsman = new Swordsman('3');

        $result = $archer->attack($cavalry);
        $this->assertContains($result, ['opponent_dead', 'opponent_defended']);

        $result = $archer->attack($swordsman);
        $this->assertEquals('opponent_dead', $result);

        $result = $archer->attack($archer);
        $this->assertEquals('opponent_dead', $result);
    }

    /**
     * @return void
     */
    public function testCavalryAttack()
    {
        $cavalry = new Cavalry('1');
        $archer = new Archer('2');
        $swordsman = new Swordsman('3');

        $result = $cavalry->attack($archer);
        $this->assertEquals('opponent_dead', $result);

        $result = $cavalry->attack($swordsman);
        $this->assertEquals('opponent_dead', $result);

        $result = $cavalry->attack($cavalry);
        $this->assertEquals('opponent_dead', $result);
    }

    public function testSwordsmanAttack()
    {
        $swordsman = new Swordsman('1');
        $archer = new Archer('2');
        $cavalry = new Cavalry('3');

        $result = $swordsman->attack($archer);
        $this->assertEquals('opponent_dead', $result);

        $result = $swordsman->attack($cavalry);
        $this->assertEquals('nothing', $result);

        $result = $swordsman->attack($swordsman);
        $this->assertEquals('opponent_dead', $result);
    }
}

?>
