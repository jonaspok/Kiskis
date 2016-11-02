<?php
/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16.11.1
 * Time: 10.23
 */

namespace SandboxBundle\Service;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use SandboxBundle\Entity\Kiskis;
use Doctrine\Common\EventSubscriber;



class KiskisFactory implements EventSubscriber
{
    private $kiskis;

    public function __construct()
    {
        $this->kiskis = new Kiskis();
    }

    public function getKiskis()
    {
        return $this->kiskis;
    }


    public function getSubscribedEvents()
    {
        return array(
            'postPersist',
        );
    }



    public function postPersist(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        echo "Kiskis was saved in the database. Weight: {$object->getWeight()} kg and colour: {$object->getColour()}" . PHP_EOL;
    }


    public function prePersist(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        echo "Kiskis is going to be saved in the database. Weight: {$object->getWeight()} kg and colour: {$object->getColour()}" . PHP_EOL;
    }
}
