<?php

namespace App;

use App\Interfaces\HeroInterface;

abstract class Hero implements HeroInterface
{

    /**
     * @var string|string
     */
    protected string $id;

    /**
     * @var int|int
     */
    protected int $health;

    /**
     * @var int|int
     */
    protected int $maxHealth;

    /**
     * @param string $id
     * @param int $maxHealth
     */
    public function __construct(string $id, int $maxHealth)
    {
        $this->id = $id;
        $this->health = $maxHealth;
        $this->maxHealth = $maxHealth;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @param int $health
     * @return void
     */
    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    /**
     * @return void
     */
    public function rest(): void
    {
        $this->health = min($this->health + 10, $this->maxHealth);
    }
}

?>
