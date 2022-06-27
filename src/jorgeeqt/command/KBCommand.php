<?php

namespace jorgeeqt\command;

use jorgeeqt\CustomKB;
use pocketmine\command\{CommandSender, Command};
use pocketmine\utils\TextFormat;

class KBCommand extends Command {
  
  public function __construct(private CustomKB $loader){
    parent::__construct("kb", "Edit server knockback");
    $this->setPermission("kb.command");
    $this->loader = $loader;
  }
  
  public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
    if($sender->hasPermission("kb.command")){
      if(!empty($args[1])){
        $kb = $args[0];
        $cooldown = $args[1];
        $config = CustomKB::getInstance()->getConfig();
        
        $config->get("knockback", $args[0]);
        $config->get("kb.cooldown", $args[1]);
        $config->save();
        
        $sender->sendMessage(TextFormat::BOLD . TextFormat::AQUA . "KB:" . TextFormat::RESET . TextFormat::GREEN . " The Knockback has been changed");
        
      } else {
        
        $sender->sendMessage(TextFormat::RED . "You no have permission to use this command");
      }
    } else {
      $sender->sendMessage(TextFormat::BOLD . TextFormat::AQUA . "KB:" . TextFormat::RESET . TextFormat::RED . " /kb (knockback) (cooldown)");
    }
  return true;
  }
}
   
