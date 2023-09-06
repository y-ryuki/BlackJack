<?php

namespace BlackJack;

class Deck
{
    public function cardDeck() :array
    {
        $cards=[];
        $cardNum =["2","3","4","5","6","7","8","9","10","J","Q","K","A"];
        foreach(['C','H','S','D'] as $suit){
            foreach($cardNum as $number){
                $cards[] = $suit . $number;
            }
        }

        //カードをシャッフル
        shuffle($cards);
        return $cards;
    }


    //カードを一枚引く
    public function drawCards() :string
    {
        $shuffleCards = self::cardDeck();

        $drawCard = array_splice($shuffleCards,0,1)[0];

        return $drawCard;

    }



}