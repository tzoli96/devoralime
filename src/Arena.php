<?php

namespace App;

class Arena
{
    /**
     * @var array
     */
    private array $heroes = [];

    /**
     * @var array
     */
    private array $history = [];

    /**
     * @param Hero $hero
     * @return void
     */
    public function addHero(Hero $hero): void
    {
        $this->heroes[] = $hero;
    }

    /**
     * @return array
     */
    public function getHeroes(): array
    {
        return $this->heroes;
    }

    /**
     * @param string $entry
     * @return void
     */
    public function addHistory(string $entry): void
    {
        $this->history[] = $entry;
    }

    /**
     * @return array
     */
    public function getHistory(): array
    {
        return $this->history;
    }

    /**
     * @return void
     */
    public function battle(): void
    {
        while (count($this->heroes) > 1) {
            $attackerKey = array_rand($this->heroes);
            do {
                $defenderKey = array_rand($this->heroes);
            } while ($attackerKey == $defenderKey);

            $attacker = $this->heroes[$attackerKey];
            $defender = $this->heroes[$defenderKey];

            $result = $attacker->attack($defender);
            $this->processResult($attacker, $defender, $result);

            foreach ($this->heroes as $key => $hero) {
                if ($hero->getHealth() <= 0) {
                    unset($this->heroes[$key]);
                }
            }

            foreach ($this->heroes as $hero) {
                if ($hero !== $attacker && $hero !== $defender) {
                    $hero->rest();
                }
            }
        }
    }

    /**
     * @param Hero $attacker
     * @param Hero $defender
     * @param string $result
     * @return void
     */
    private function processResult(Hero $attacker, Hero $defender, string $result): void
    {
        $entry = "Attacker ({$attacker->getId()}) attacked Defender ({$defender->getId()}) - ";
        switch ($result) {
            case 'opponent_dead':
                $defender->setHealth(0);
                $entry .= "Defender is dead";
                break;
            case 'opponent_defended':
                $entry .= "Defender defended";
                break;
            case 'nothing':
                $entry .= "Nothing happened";
                break;
        }
        $this->addHistory($entry);
    }
}

?>
