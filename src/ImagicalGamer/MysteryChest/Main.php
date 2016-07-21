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
use pocketmine\level\sound\EndermanTeleportSound;

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
        $player->sendMessage("§8§l<§r§bC§ar§ba§at§be§as§8§l>");
        $player->sendMessage("§7Opening§b...");
  
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
        $prize = rand(1,10);
        switch($prize){
        case 1:
          $inventory->addItem(Item::get(364,0,20));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b20 Steak§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;
        case 2:
          $inventory->addItem(Item::get(264,0,5));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b5 Diamonds§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;   
        case 3:
          $inventory->addItem(Item::get(364,0,12));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b12 Steak§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;   
        case 4:
          $inventory->addItem(Item::get(351,4,15));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b15 Lapis Lazuli§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;      
        case 5:
          $inventory->addItem(Item::get(339,750,1));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b$750§7 In Money Note form!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;     
        case 6:
          $inventory->addItem(Item::get(388,0,2));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won§b 2 Crate Keys§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;
        case 7:
          $inventory->addItem(Item::get(17,0,16));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b16 Oak Logs§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;
        case 8:
          $inventory->addItem(Item::get(322,0,5));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b5 Golden Apples§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;
        case 9:
          $inventory->addItem(Item::get(384,0,20));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b20 XP Bottles§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;
        case 10:
          $inventory->addItem(Item::get(279,0,1));
          $player->sendMessage("§2========");
          $player->sendMessage("§7You won §b1 Diamond Axe§7!");
          $player->sendMessage("§2========");
          $level->addSound(new EndermanTeleportSound(new Vector3($x, $y + 1, $z)));
        break;
    }
  }
}
}
}
