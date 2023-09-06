<?php

namespace BlackJack;

require_once ('GamePlayer.php');
class Player extends GamePlayer
{
    public function __construct(private string $player)
    {
        parent::__construct($player);
    }

    public function getName() :string
    {
        return $this->player;
    }

    
    public function drawCard(Deck $deck) :string
    {
        $drawCard = $deck->drawCards();

        echo $this->player .'の引いたカードは' . $drawCard . 'です。' .PHP_EOL;

        return $drawCard;

    }




}