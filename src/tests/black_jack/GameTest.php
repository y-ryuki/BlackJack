<?php
namespace BlackJack\Tests;

use PHPUnit\Framework\TestCase;
use BlackJack\Game;
use BlackJack\Dealer;
use BlackJack\Player;

require_once(__DIR__ . '/../../lib/black_jack/Game.php');
require_once(__DIR__ . '/../../lib/black_jack/Dealer.php');
require_once(__DIR__ . '/../../lib/black_jack/Player.php');

class GameTest extends TestCase
{
    public function testStart()
    {
        $game = new Game(new Dealer('ディーラー'),new Player('プレイヤー'));
        $result = $game->start();

        // //プレイヤーが2人の場合
        // $game1 = new Game(new Dealer('ディーラー'),new Player(['織田さん','徳川さん'));
        // $result = $game1->start();

    }
 
        
}