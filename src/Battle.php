<?php

namespace App;

class Battle
{

    /**
     * @var Arena
     */
    private Arena $arena;

    /**
     * @param Arena $arena
     */
    public function __construct(Arena $arena)
    {
        $this->arena = $arena;
    }

    /**
     * @return array
     */
    public function start(): array
    {
        $history = [];
        while (count($this->arena->getHeroes()) > 1) {
            $attackerKey = array_rand($this->arena->getHeroes());
            do {
                $defenderKey = array_rand($this->arena->getHeroes());
            } while ($attackerKey == $defenderKey);

            $attacker = $this->arena->getHeroes()[$attackerKey];
            $defender = $this->arena->getHeroes()[$defenderKey];

            $result = $attacker->attack($defender);
            $this->processResult($attacker, $defender, $result);

            foreach ($this->arena->getHeroes() as $key => $hero) {
                if ($hero->getHealth() <= 0) {
                    unset($this->arena->getHeroes()[$key]);
                }
            }

            foreach ($this->arena->getHeroes() as $hero) {
                if ($hero !== $attacker && $hero !== $defender) {
                    $hero->rest();
                }
            }

            $history[] = [
                'attacker' => $attacker->getId(),
                'defender' => $defender->getId(),
                'result' => $result,
                'attacker_health' => $attacker->getHealth(),
                'defender_health' => $defender->getHealth()
            ];
        }

        return $history;
    }

    /**
     * @param Hero $attacker
     * @param Hero $defender
     * @param string $result
     * @return void
     */
    private function processResult(Hero $attacker, Hero $defender, string $result): void
    {
        switch ($result) {
            case 'opponent_dead':
                $defender->setHealth(0);
                break;
            case 'opponent_defended':
                // Nothing to do, defender is fine
                break;
            case 'nothing':
                // Nothing happened
                break;
        }
    }
}

?>
