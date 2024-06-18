<?php

namespace App\Interfaces;

interface HeroInterface
{

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return int
     */
    public function getHealth(): int;

    /**
     * @param int $health
     * @return void
     */
    public function setHealth(int $health): void;

    /**
     * @param HeroInterface $opponent
     * @return string
     */
    public function attack(HeroInterface $opponent): string;
}

?>