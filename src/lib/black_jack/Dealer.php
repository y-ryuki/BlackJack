<?php

namespace BlackJack;

require_once ('GamePlayer.php');

class Dealer extends GamePlayer
{
    public function __construct(private string $dealer)
    {
        parent::__construct($dealer);
    }

    public function getName() :string
    {
        return $this->dealer;
    }

    private int $dealerCount = 0;

    public function drawCard(Deck $deck) :string
    {
        $drawCard = $deck->drawCards();
        $this->dealerCount ++;
        //２枚目は出力しない
        if($this->dealerCount === 2)
        {
            echo $this->dealer .'の引いた2枚目のカードはわかりません。' . PHP_EOL;
        }else{
            echo $this->dealer .'の引いたカードは' . $drawCard . 'です。' .PHP_EOL;
        }
        return $drawCard;

    }


}