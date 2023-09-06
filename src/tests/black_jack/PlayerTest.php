<?php
namespace BlackJack\Tests;
use PHPUnit\Framework\TestCase;
use BlackJack\Player;

require_once(__DIR__ . '/../../lib/black_jack/Player.php');

class PlayerTest extends TestCase
{
    public function testGetName()
    {
        $player = new Player('player');
        $result = $player->getName();
        $this->assertSame('player',$result);

    }

    

    
        
}