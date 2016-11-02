<?php

namespace NFQ\DemoBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AppDegugCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:debug');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $car = $this->getContainer()->get('app.car');

        $output->writeln($car->getEngine());
        $output->writeln('Command result.');
    }

}
