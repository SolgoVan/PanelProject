<?php

namespace App\Event;


use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;


class QuantitySubscriber implements EventSubscriber
{
    public function getSubscribedEvents(): array
    {
        return [
            Events::preUpdate,
        ];
    }

}