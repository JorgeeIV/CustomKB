<?php

namespace jorgeeqt;

use jorgeeqt\KBListener;

//use jorgeeqt\command\KBCcommand; 

use pocketmine\Server;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\{TextFormat, Config};

class CustomKB extends PluginBase {

	

	private static $instance;

	

	public function onEnable(): void {

		self::$instance = $this;

        $this->getLogger()->notice(

              "Custom Knockback

               Enabled Sussefully"

        );

        $this->getServer()->getPluginManager()->registerEvents(new KBListener($this), $this);

        $this->saveResource("config.yml");

    }

    

    public static function getInstance(): CustomKB

    {

        return self::$instance;

    }

}
