<?php
//...SNAKE EST GAY SNAKE EST AY SNAKE EST GAY SNAKE EST GAY SNAKE EST GAY SNAKE EST GAY


namespace EffectStick\EffectStickHorizon;

use pocketmine\event\Listener;

class EventListener implements Listener{

    /**
     * @var array
     */
    private $sticks;

    /**
     * @var array
     */
    private $cooldown = [],

    public function __construct()
    {
        $this->sticks = [
            '369:0' => new [EffectInstance(
                Effect::getEffect( id: Effect::HEALING),
                duration: 1,
                amplifier: 3,
                visible: false
        ), '§4[§6HealStick§4]§6Vous avez été heal !']
        ];
    }

    public function onInteract(PlayerInteractEvent $event){
        $item = $event->getItem();
        $idMeta = $item->getId() . ':' . $item->getDamage();
        if(isset($this->sticks[$idMeta])){
            $player = $event->getPlayer();
            $lastPlayerTime = $this->cooldown[$player->getName()] ?? 0;
            $timeNow = time();
            if($timeNow - $lastPlayerTime >= 5){
                $player->addEffect($this->sticks[$idMeta][0]);
                $player->getInventory()->removeItem($item->setCount( count: 1));
                $this->cooldown[$player->getName()] = $timeNow;
                $player->sendPopup($this->sticks[$idMeta][1])
            }
        }
    }

}