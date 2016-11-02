<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16.10.27
 * Time: 18.23
 */

namespace NFQ\DemoBundle\Event;


class EventListener
{
 public function makeChanges ($event)
 {
     $car = $event->getCar();
     $car->setEngine('4.2 TFSI');
 }
}