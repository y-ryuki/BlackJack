<?php

namespace BlackJack;

abstract class GamePlayer
{
    public function __construct(private string $player)
    {
    }

    public function getName() :string
    {
        return $this->player;
    }

    abstract public function drawCard(Deck $deck) :string;

}