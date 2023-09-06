<?php
namespace BlackJack\Tests;
use PHPUnit\Framework\TestCase;
use BlackJack\Card;

require_once(__DIR__ . '/../../lib/black_jack/Card.php');

class CardTest extends TestCase
{
    public function testGetScore()
    {
        $card = new Card('HK');
        $result = $card->getScore(0);
        $this->assertSame(10,$result);

    }

    public function testGetCountA()
    {
        $card = new Card('DA');
        $result = $card->getCountA(11);
        $this->assertSame(1,$result);

    }

    

    
        
}