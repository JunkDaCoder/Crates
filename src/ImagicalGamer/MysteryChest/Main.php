<?php
namespace ImagicalGamer\MysteryChest;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\utils\Config;

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
    @mkdir($this->getDataFolder());
    $config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
    $config->save();
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }

  public function onInteract(PlayerInteractEvent $event){
    $block = $event->getBlock();
    $player = $event->getPlayer();
    $inventory = $player->getInventory();       
      if($block->getId() === Block::CHEST){     
        if($inventory->contains(new Emerald(0,1))) {
        $event->setCancelled();
        $player->sendMessage(C::AQUA . "Opening a MysteryChest...I wonder whats inside!");

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
        $prize = rand(1,6);
        switch($prize){
        case 1:
          $inventory->addItem(Item::get(22,0,1));
          $this->getServer()->broadcastMessage("§e---[•§2Crates§e•]---");
          $this->getServer()->broadcastMessage("§7•The player§b " . $player->getName() . "§7found §a1 Lapis Block§7!•");
        break;
        case 2:
          $inventory->addItem(Item::get(364,0,8));
          $this->getServer()->broadcastMessage("§e---[•§2Crates§e•]---");
          $this->getServer()->broadcastMessage("§7•The player§b " . $player->getName() . "§7found §a8 Steak§7!•");
        break;   
        case 3:
          $inventory->addItem(Item::get(266,0,9));
          $this->getServer()->broadcastMessage("§e---[§•2Crates§e•]---");
          $this->getServer()->broadcastMessage("§7•The player§b " . $player->getName() . "§7found §a9 Gold Ingots§7!•");
        break;   
        case 4:
          $inventory->addItem(Item::get(265,0,7));
          $this->getServer()->broadcastMessage("§e---[•§2Crates§e•]---");
          $this->getServer()->broadcastMessage("§7•The player§b " . $player->getName() . "§7found §a7 Iron Ingots§7!•");
        break;      
        case 5:
          $inventory->addItem(Item::get(264,0,5));
          $this->getServer()->broadcastMessage("§e--[•§2Crates§e•]---");
          $this->getServer()->broadcastMessage("•§7The player§b " . $player->getName() . "§7found §a5 Diamonds§7!•");
        break;     
        case 6:
          $inventory->addItem(Item::get(339,1000,1));
          $this->getServer()->broadcastMessage("§e---[•§2Crates§e•]---");
          $this->getServer()->broadcastMessage("•§7The player§b " . $player->getName() . "§7 found§a $1000§7 in MoneyNote form!•");
        break;
    }
  }
}
}
}
