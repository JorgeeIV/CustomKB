<?php

namespace jorgeeqt;

use jorgeeqt\KBListener;
use jorgeeqtcommand\KBCommand;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\{TextFormat, Config};

class CustomKB extends PluginBase {
  
  private static CustomKB $instance;
  
  public static function getInstance() CustomKB
  {
    return self::$instance;
  }
  
  public function onEnable(): void
  {
    self::$instance = $this;
    $this->getLogger()->notice(
      "Custom Knockback
       Enabled Sussefully"
    );
    $this->getServer()->getCommandMap()->register("kb", new KBCommand($this));
    $this->getServer()->getPluginManager()->registerEvents(new KBListener($this), $this);
    $this->saveResource("config.yml");
  }
}   
