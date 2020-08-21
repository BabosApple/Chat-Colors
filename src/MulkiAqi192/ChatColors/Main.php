<?php

namespace MulkiAqi192\ChatColors;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener {

    public function onEnable(){
        if(is_null($this->getServer()->getPluginManager()->getPlugin("FormAPI"))){
            $this->getLogger()->info("§cNo plugin called 'FormAPI' installed, disabling....");
            $this->getServer()->getPluginManager()->disablePlugins($this);
        } else {
            $this->getLogger()->info("§aFormAPI founded! ChatColors has been enabled");
        }
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public $white = [];

    public $red = [];

    public $blue = [];

    public $green = [];

    public $yellow = [];

    public $orange = [];

    public $purple = [];

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{

        switch($command->getName()){
            case "ccolors":
                if($sender instanceof Player){
                    if($sender->hasPermission("ccolors.use")){
                        $this->ccolors($sender);
                    } else {
                        $seder->sendMessage("§cYou dont have permission to use this command!");
                    }
                } else {
                    $sender->sendMessage("§cPlease use this command in-game!");
                }
        }
    return true;
    }

    public function ccolors($player){
        $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){
            if($data === null){
                return true;
            }
            switch($data){
                case 0:
                    unset($this->red[$player->getName()]);
                    unset($this->blue[$player->getName()]);
                    unset($this->green[$player->getName()]);
                    unset($this->yellow[$player->getName()]);
                    unset($this->orange[$player->getName()]);
                    unset($this->purple[$player->getName()]);
                    $this->white[$player->getName()] = $player->getName();
                    $player->sendMessage("§7[§aChat§6Colors§7] §aYour chat message has been changed to §fWhite!");
                    break;

                case 1:
                    unset($this->white[$player->getName()]);
                    unset($this->blue[$player->getName()]);
                    unset($this->green[$player->getName()]);
                    unset($this->yellow[$player->getName()]);
                    unset($this->orange[$player->getName()]);
                    unset($this->purple[$player->getName()]);
                    $this->red[$player->getName()] = $player->getName();
                    $player->sendMessage("§7[§aChat§6Colors§7] §aYour chat message has been changed to §cRed!");
                    break;

                case 2:
                    unset($this->red[$player->getName()]);
                    unset($this->white[$player->getName()]);
                    unset($this->green[$player->getName()]);
                    unset($this->yellow[$player->getName()]);
                    unset($this->orange[$player->getName()]);
                    unset($this->purple[$player->getName()]);
                    $this->blue[$player->getName()] = $player->getName();
                    $player->sendMessage("§7[§aChat§6Colors§7] §aYour chat message has been changed to §bBlue!");
                    break;

                case 3:
                    unset($this->red[$player->getName()]);
                    unset($this->blue[$player->getName()]);
                    unset($this->white[$player->getName()]);
                    unset($this->yellow[$player->getName()]);
                    unset($this->orange[$player->getName()]);
                    unset($this->purple[$player->getName()]);
                    $this->green[$player->getName()] = $player->getName();
                    $player->sendMessage("§7[§aChat§6Colors§7] §aYour chat message has been changed to §aGreen!");
                    break;

                case 4:
                    unset($this->red[$player->getName()]);
                    unset($this->blue[$player->getName()]);
                    unset($this->green[$player->getName()]);
                    unset($this->white[$player->getName()]);
                    unset($this->orange[$player->getName()]);
                    unset($this->purple[$player->getName()]);
                    $this->yellow[$player->getName()] = $player->getName();
                    $player->sendMessage("§7[§aChat§6Colors§7] §aYour chat message has been changed to §eYellow!");
                    break;

                case 5:
                    unset($this->red[$player->getName()]);
                    unset($this->blue[$player->getName()]);
                    unset($this->green[$player->getName()]);
                    unset($this->yellow[$player->getName()]);
                    unset($this->white[$player->getName()]);
                    unset($this->purple[$player->getName()]);
                    $this->orange[$player->getName()] = $player->getName();
                    $player->sendMessage("§7[§aChat§6Colors§7] §aYour chat message has been changed to §6Orange!");
                    break;

                case 6:
                    unset($this->red[$player->getName()]);
                    unset($this->blue[$player->getName()]);
                    unset($this->green[$player->getName()]);
                    unset($this->yellow[$player->getName()]);
                    unset($this->orange[$player->getName()]);
                    unset($this->white[$player->getName()]);
                    $this->purple[$player->getName()] = $player->getName();
                    $player->sendMessage("§7[§aChat§6Colors§7] §aYour chat message has been changed to §dPurple!");
                    break;
            }
        });
        $form->setTitle("§aChat§6Colors");
        $form->setContent("§9>> §eSelect your color you prefer to your chat message!");
        $form->addButton("White");
        $form->addButton("§cRed");
        $form->addButton("§bBlue");
        $form->addButton("§aGreen");
        $form->addButton("§eYellow");
        $form->addButton("§6Orange");
        $form->addButton("§dPurple");
        $form->sendToPlayer($player);
        return $form;
    }

    public function wred(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(isset($this->white[$player->getName()])){
            $event->setMessage("§f" . $event->getMessage());
        }
    }

    public function cred(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(isset($this->red[$player->getName()])){
            $event->setMessage("§c" . $event->getMessage());
        }
    }

    public function bred(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(isset($this->blue[$player->getName()])){
            $event->setMessage("§b" . $event->getMessage());
        }
    }

    public function gred(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(isset($this->green[$player->getName()])){
            $event->setMessage("§a" . $event->getMessage());
        }
    }

    public function yred(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(isset($this->yellow[$player->getName()])){
            $event->setMessage("§e" . $event->getMessage());
        }
    }

    public function ored(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(isset($this->orange[$player->getName()])){
            $event->setMessage("§6" . $event->getMessage());
        }
    }

    public function pred(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(isset($this->purple[$player->getName()])){
            $event->setMessage("§d" . $event->getMessage());
        }
    }

}
