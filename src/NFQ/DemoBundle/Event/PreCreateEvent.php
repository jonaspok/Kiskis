<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16.10.27
 * Time: 18.23
 */

namespace NFQ\DemoBundle\Event;


use Symfony\Component\EventDispatcher\Event;

class PreCreateEvent extends Event
{
 private $car;

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     * @return PreCreateEvent
     */
    public function setCar($car)
    {
        $this->car = $car;
        return $this;
    }

}