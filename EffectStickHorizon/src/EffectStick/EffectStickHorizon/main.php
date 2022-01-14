<?php
//...SNAKE EST GAY SNAKE EST AY SNAKE EST GAY SNAKE EST GAY SNAKE EST GAY SNAKE EST GAY

namespace EffectStick\EffectStickHorizon;


use pocketmine\plugin\PluginBase;


class main extends PluginBase{
    
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }
}