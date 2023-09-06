<?php
namespace BlackJack;

class Card
{
    public  const CARD_SCORE = [
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        '10' => 10,
        'J' => 10,
        'Q' => 10,
        'K' => 10,
];


    private const LIMITED_SCORE_HARF = 11;
    private const MAX_NUM_SCORE = 11;
    private const MIN_NUM_SCORE = 1;




    public function __construct (private string $suitNumber)
    {
    }

    public function getScore (int $calcSum) :int
    {
        if(str_contains($this->suitNumber,'A') === true)
        {
            return $this->getCountA($calcSum);
        }
        return self::CARD_SCORE[substr($this->suitNumber, 1, strlen($this->suitNumber) - 1)];//得点を返す
    }

    public function getCountA ($calcSum) :int
    { 
        if($calcSum < self::LIMITED_SCORE_HARF)
        {
            return self::MAX_NUM_SCORE;
        }else{
            return self::MIN_NUM_SCORE;
        }
        
    }





}