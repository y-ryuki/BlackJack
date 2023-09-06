<?php

namespace BlackJack;

require_once('Game.php');
require_once('Player.php');
require_once('Dealer.php');

$dealer = new Dealer('ディーラー');
$player = new Player('プレイヤー1');
$game = new Game($dealer, $player);
$game->start();