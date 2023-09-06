<?php
namespace BlackJack\Tests;
use PHPUnit\Framework\TestCase;
use BlackJack\Dealer;

require_once(__DIR__ . '/../../lib/black_jack/Dealer.php');

class DealerTest extends TestCase
{
    public function testGetName()
    {
        $player = new Dealer('dealer');
        $result = $player->getName();
        $this->assertSame('dealer',$result);

    }

    

    
        
}