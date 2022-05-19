<?php
namespace NetureCrafter\ClearChat\Commands;
use NetureCrafter\ClearChat\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;

class ClearChatCommand extends Command {

    public function __construct(){
        $config = Main::getInstance()->getConfig();
        parent::__construct("ClearChatCommand", $config->get("ClearChatCommandDescription"), $config->get("CleaerChatCommand"), $config->get("ClaerChatCommandAliases"));
        $this->setPermission("c.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void{
        $config = Main::getInstance()->getConfig();
        if(!$sender instanceof Player){
            $sender->sendMessage("§cPlease use this command in-game");
            return;
        }
        if(!$sender->hasPermission("c.cmd")){
            $sender->sendMessage($config->get("message.noPerm"));
            return;
        }
        for ($i = 0; $i < 100; $i++) {
            if (empty($args[0])) $sender->sendMessage("§7");
            elseif($args[0] === "all") Server::getInstance()->broadcastMessage("§7");
        }
        $sender->sendMessage($config->get("message.chatSuccessfullyCleared"));
    }
}