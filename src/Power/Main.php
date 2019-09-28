<?php

 namespace Power;
 

use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

 class Main extends PluginBase implements Listener {

   
   public $config;

   public const PREFIX  = "§r[§aPower-§ePlugin§r] §9";


   public function onEnable() {

    $this->getServer()->getPluginManager()->registerEvents($this, $this); 

    $this->getServer()->getLogger()->warning(TextFormat::BLUE . "Power " . TextFormat::GREEN . "Aktiviert.");

  }

  

  public function onDisable() {
    $this->getServer()->getLogger()->info(TextFormat::BLUE . "Power " . TextFormat::RED . "Deaktiviert.");

  }

   

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {

    if ($cmd->getName() == "power-help") {

            if(!isset($args[0]) || count($args) < 1) {

                $sender->sendMessage(TextFormat::RED . "Usage: §8/power-help <seitenzahlen>");

                return true;

            }

            switch(strtolower($args[0])) {

              case "1":

                  $sender->sendMessage("§9--------------<§r§aPower-Commands§r§9>§9----help-1 von 1----");

                  

                return true;

                break;

            }

        }

    

     if ($cmd->getName() == "broadcaster") {

            if ($sender->hasPermission("broadcaster.command")) {

                if (count($args) >- 1) {

                  $nachricht = implode(" ", $args);

                  $player = $sender->getName();

                    $this->getServer()->broadcastMessage("§4------------§eINFO§4------------\n$nachricht\n§6---------§8«§9" . $player . "§8»§6---------");

                    return true;

              } else {

                  $sender->sendMessage(TextFormat::RED . "Usage: §8/broadcaster nachricht...");

                  return true;

              }

            } else {

                $sender->sendMessage(self::PREFIX . "Du hast keine rechte");

            }

               return true;

         }

    if ($cmd->getName() == "fly") {

      $sender->sendMessage("§4Du kannst nicht mehr Fliegen!!")

      $sender->setAllowFlight(false);

    } else {

      $sender->sendMessage(self::PREFIX . "Du kannst nun Fliegen!")

      $sender->setAllowFlight(true);

    }

                  

  

    //Ab hier keine commands!!!

    return false;

    }
