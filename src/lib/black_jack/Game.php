<?php

namespace BlackJack;

require_once ('Deck.php');
require_once ('Card.php');

class Game{

    private const BURST_SCORE = 21;
    private const DEALER_MIN_SCORE = 17;
    private Deck $deck;
    

    public function __construct(private Dealer $dealer , private Player $player)
    {
        //デッキインスタンス
        $this->deck = new Deck();
    }
    
    
    public function start()
    {
        echo 'ブラックジャックを開始' . PHP_EOL;

        //開始時にカード２枚をそれぞれ引く
        $initPlayerScore = $this->initDrawCards($this->player);
        $initDealerScore = $this->initDrawCards($this->dealer);

        //カードを追加するかしないか（ヒットorスタンド）
       $playerScore = $this->playerCard($this->deck,$initPlayerScore);
       $dealerScore = $this->dealerGame($this->deck,$initDealerScore);

       //勝敗判定
       $this->winnerJudge($playerScore,$dealerScore);
        
        echo 'ブラックジャックを終了します。' . PHP_EOL;
        
    }

    public function initDrawCards($gamePlayer) :int
    {
        $cardSum = 0;
       
        for($i=0;$i<2;$i++)
        {
            $drawCards = $gamePlayer->drawCard($this->deck);
             //数字を取得しスコアに変換
            $gameCard = new Card($drawCards);
            $scoreCard = $gameCard->getScore($cardSum);
             //カードを計算する
            $cardSum += $scoreCard;

        }

        return $cardSum;

    }

    
    public function playerCard($deck,int $initPlayerScore) :int
    {
        // 名前を取得
        $name = $this->player->getName();
       
        $cardSum = $initPlayerScore;
        
        while(true)
        {

            echo $name . 'の合計得点は'. $cardSum . 'です。' .PHP_EOL;

            echo 'カードを引きますか？(はい,いいえ)' .PHP_EOL;

            $ans = trim(fgets(STDIN));
            echo $ans .PHP_EOL;

            if($ans === 'はい')
            { 
                //カードを引く
                $playerDrawCard = $this->player->drawCard($deck); 
                //数字を取得しスコアに変換
                $gameCard = new Card($playerDrawCard);
                $scoreCard = $gameCard->getScore($cardSum);
                //カードを計算する
                $cardSum += $scoreCard;
                
            }elseif($ans === 'いいえ'){
                echo 'あなたのターンを終了します。'.PHP_EOL;
                return $cardSum;
                break;
            }else{
                continue;

            }

            if($cardSum === self::BURST_SCORE)
            {
                echo '合計得点が21ですので、これ以上カードを引くことができません。'.PHP_EOL;
                return $cardSum;
                break;
            }

            //バーストしたら中止
            if($cardSum > self::BURST_SCORE)
            {
                echo '合計得点が21を超えたのでバーストです。これ以上カードを引くことができません。'.PHP_EOL;
                return $cardSum = 0;
                break;
            }

        }
        
    }
    
    public function dealerGame($deck,int $initDealerScore) :int
    {

        // 名前を取得
        $name = $this->dealer->getName();
        $cardSum = $initDealerScore;

        while(true)
        {
            echo $name . 'の合計得点は' . $cardSum . 'です。' .PHP_EOL;
            echo 'ディーラーは合計得点が最低17点になるようにカードを引きます。' .PHP_EOL;
                    
            if(self::DEALER_MIN_SCORE > $cardSum)
            {
                //カードを引く
                $dealerDrawCard = $this->dealer->drawCard($this->deck);
                //数字を取得しスコアに変換
                $gameCard = new Card($dealerDrawCard);
                $scoreCard = $gameCard->getScore($cardSum);

                //カードを計算する
                $cardSum += $scoreCard;
                    
            }else{
                    return $cardSum;
                    break;
                    
                }


            if($cardSum === self::BURST_SCORE)
            {
                return $cardSum;
                break;
            }

            //バーストしたら中止
            if($cardSum > self::BURST_SCORE)
            {
                $cardSum = 0;
                return $cardSum;
                break;
            }
        }
    }


    public function winnerJudge(int $playerScore,int $dealerScore) :string
    {

         // 名前を取得
        $playerName = $this->player->getName();
        $dealerName = $this->dealer->getName();
        
        echo $playerName . 'の得点は' . $playerScore . 'です。' . PHP_EOL;
        echo $dealerName . 'の得点は' . $dealerScore . 'です。' . PHP_EOL;

        if($playerScore > $dealerScore){
            echo $playerName . 'の勝ちです'.PHP_EOL;
            return $playerName;
        }elseif($dealerScore > $playerScore){
            echo $dealerName . 'の勝ちです'.PHP_EOL;
            return $dealerScore;
        }elseif($playerScore === $dealerScore){
            echo '引き分けです'.PHP_EOL;
            return 'DRAW';
        }

    }

    
}
    