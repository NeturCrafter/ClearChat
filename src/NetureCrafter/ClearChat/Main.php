<?php
namespace NetureCrafter\ClearChat;
use NetureCrafter\ClearChat\Commands\ClearChatCommand;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase{
    use SingletonTrait;

    public function onEnable(): void{
        self::setInstance($this);
        $this->saveResource("config.yml");

        $this->getServer()->getCommandMap()->register($this->getName(), new ClearChatCommand());
    }
}