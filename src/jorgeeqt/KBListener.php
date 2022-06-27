<?php

namespace jorgeeqt;

use jorgeeqt\CustomKB;

use pocketmine\player\Player;

use pocketmine\event\Listener;

use pocketmine\event\entity\{EntityDamageEvent, EntityDamageByEntityEvent};

use pocketmine\utils\Config;

class KBListener implements Listener {

	    public function cooldown(EntityDamageByEntityEvent $event): void

    {

      $event->setAttackCooldown($event->getAttackCooldown() - CustomKB::getInstance()->getConfig()->get("kb.cooldown"));

    }

  

    public function knockback(EntityDamageByEntityEvent $event): void

    {

      $event->setKnockBack(CustomKB::getInstance()->getConfig()->get("knockback") * $event->getKnockBack());

    }

}
