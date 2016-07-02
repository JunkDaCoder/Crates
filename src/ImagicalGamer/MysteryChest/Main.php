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
use pocketmine\level\sound\PopSound;

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
        $player->sendMessage("§l§aOpening§r§b...");
  
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
        $prize = rand(1,30);
        switch($prize){
        case 1:
          $inventory->addItem(Item::get(351,4,9));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b9 Lapis Lazuli§7!");
          $player->sendMessage("§e§lCHANCE:§r§b [3/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 2:
          $inventory->addItem(Item::get(364,0,16));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b16 Steak§7!");
          $player->sendMessage("§e§lCHANCE:§r§b [5/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;   
        case 3:
          $inventory->addItem(Item::get(266,0,8));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b8 Gold Ingots!");
          $player->sendMessage("§e§lCHANCE:§r§b [3/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;   
        case 4:
          $inventory->addItem(Item::get(351,4,9));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b9 Lapis Lazuli§7!");
          $player->sendMessage("§e§lCHANCE:§r§b [3/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;      
        case 5:
          $inventory->addItem(Item::get(351,4,9));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b9 Lapis Lazuli§7!");
          $player->sendMessage("§e§lCHANCE:§r§b [3/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;     
        case 6:
          $inventory->addItem(Item::get(339,1000,1));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b$1000 in MoneyNote form§7!");
          $player->sendMessage("§e§lCHANCE:§r§b [2/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 7:
          $inventory->addItem(Item::get(17,0,16));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b16 Oak Logs§7!");
          $player->sendMessage("§e§lCHANCE:§r§b [3/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 8:
          $inventory->addItem(Item::get(339,1000,1));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won§b$1000 in MoneyNote form§7!");
          $player->sendMessage("§e§lCHANCE:§r§b [2/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 9:
          $inventory->addItem(Item::get(307,0,1));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 1 Iron Chestplate§7 from a§c Vote Crate§7! •");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 10:
          $inventory->addItem(Item::get(384,0,24));
          $this->getServer()->broadcastMessage("§7•§b " . $player->getName() . "§7 found §a 24 XP Bottles§7 from a§c Vote Crate§7! •");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 11:
          $inventory->addItem(Item::get(388,0,2));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b2 Vote Keys!");
          $player->sendMessage("§e§lCHANCE:§r§b [1/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 12:
          $inventory->addItem(Item::get(360,0,4));
          $this->getServer()->broadcastMesssage("§7•§b " . $player->getName() . "§7 found §a 4 Melons§7 from a§c Vote Crate§7! •");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 13:
          $inventory->addItem(Item::get(264,0,4));
          $player->sendMessage("§a§lVoteCrate§r§e>§7 You won §b4 Diamonds§7!");
          $player->sendMessage("§e§lCHANCE:§r§b [1/30]");
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 14:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 15:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 16:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 17:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 18:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 19:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 20:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 21:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 22:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 23:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 24:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 25:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 26:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 27:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 28:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 29:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
        case 30:
          $level->addSound(new PopSound(new Vector3($x, $y + 1, $z)));
        break;
    }
  }
}
}
}
