<?php

namespace LUKAYZX\UltraGM;

use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\VanillaItems;
use pocketmine\player\GameMode;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class UltraGM extends PluginBase implements Listener {

    protected function onEnable(): void {
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);
    }

    public function PlayerInteract(PlayerInteractEvent $interactEvent) {

        if ($interactEvent->getPlayer()->getGamemode() === GameMode::CREATIVE() && PlayerInteractEvent::RIGHT_CLICK_BLOCK && $interactEvent->getBlock() !== VanillaBlocks::AIR() && $interactEvent->getPlayer()->getInventory()->getItemInHand()->equals(VanillaItems::AIR())) {
            $interactEvent->getPlayer()->getInventory()->setItemInHand($interactEvent->getBlock()->asItem());
        }

    }

}