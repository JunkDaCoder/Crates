<?php
namespace ImagicalGamer\MysteryChest;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\item\Item;
use pocketmine\item\Emerald;
use pocketmine\block\Block;

use pocketmine\utils\TextFormat as C;

use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\particle\FlameParticle;

/* Copyright (C) ImagicalGamer - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Jake C <imagicalgamer@outlook.com>, May 2016
 */

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onInteract(PlayerInteractEvent $event){
    $block = $event->getBlock();
    $player = $event->getPlayer();
    $inventory = $player->getInventory();
      if($block->getId() === Block::TRAPPED_CHEST){     
        if($inventory->contains(new Emerald(0,1))) {
          $event->getPlayer()->getInventory()->removeItem(Item::Get(388,0,1));
        $event->setCancelled();
        $player->sendMessage("§l§b§7• Opening a MysteryChest...I wonder whats inside! •");
  
        $level = $player->getLevel();
        $x = $block->getX();
        $y = $block->getY();
        $z = $block->getZ();
        $r = 0;
        $g = 255;
        $b = 255;
        $center = new Vector3($x+1, $y, $z);
        $radius = 0.5;
        $count = 100;
        $particle = new FlameParticle($center, $r, $g, $b, 1);
          for($yaw = 0, $y = $center->y; $y < $center->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
              $x = -sin($yaw) + $center->x;
              $z = cos($yaw) + $center->z;
              $particle->setComponents($x, $y, $z);
              $level->addParticle($particle);
}
        $prize = rand(1,12);
        switch($prize){
        case 1:
          $inventory->addItem(Item::get(351,4,3));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 3 Lapis Lazuli§7 from a§c Vote Crate§7! •");
        break;
        case 2:
          $inventory->addItem(Item::get(364,0,8));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 8 Steak§7 from a§c Vote Crate§7! •");
        break;   
        case 3:
          $inventory->addItem(Item::get(266,0,3));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 3 Gold Ingots§7 from a§c Vote Crate§7! •");
        break;   
        case 4:
          $inventory->addItem(Item::get(265,0,3));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 3 Iron Ingots§7 from a§c Vote Crate§7! •");
        break;      
        case 5:
          $inventory->addItem(Item::get(264,0,1));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 1 Diamond§7 from a§c Vote Crate§7! •");
        break;     
        case 6:
          $inventory->addItem(Item::get(339,100,1));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a $100§7 in MoneyNote form from a§c Vote Crate§7! •");
        break;
        case 7:
          $inventory->addItem(Item::get(112,0,16));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 16 Netherbricks§7 from a§c Vote Crate§7! •");
        break;
        case 8:
          $inventory->addItem(Item::get(121,0,16));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 16 Endstone§7 from a§c Vote Crate§7! •");
        break;
        case 9:
          $inventory->addItem(Item::get(307,0,1));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 1 Iron Chestplate§7 from a§c Vote Crate§7! •");
        break;
        case 10:
          $inventory->addItem(Item::get(384,0,24));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 24 XP Bottles§7 from a§c Vote Crate§7! •");
        break;
        case 11:
          $inventory->addItem(Item::get(388,0,1));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 1 Vote key§7 from a§c Vote Crate§7! •");
        break;
        case 12:
          $inventory->addItem(Item::get(360,0,4));
          $this->getServer()->broadcastMesssage("§7•§b " . $player->getName() . "§7 found §a 4 Melons§7 from a§c Vote Crate§7! •");
        break;
    }
  }
}
}
}
