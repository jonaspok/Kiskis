<?php

/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 16.10.28
 * Time: 15.48
 */
namespace SandboxBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;



class CLICommand extends ContainerAwareCommand
{
    private $command;
    protected function configure()
    {
        $this
            ->setName('CLI')
            ->setDefinition([
                new InputArgument(
                    'weight',
                    InputArgument::REQUIRED,
                    'Weight in kg'
                ),
                new InputOption(
                    'colour',
                    'c',
                    InputOption::VALUE_REQUIRED,
                    'Indicates colour',
                    'white'
                )
            ])
            ->setDescription('Display properties of Kiskis')
        ;
    }
    /**
     * Sets the command.
     *
     * @param Command $command The command to set
     */
    public function setCommand(Command $command)
    {
        $this->command = $command;
    }
    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $weight = $input->getArgument('weight');
        $colour = $input->getOption('colour');

        // Klase KiskisFactory turi event listener ir event subscriber metodus
        $kiskisFactory = $this->getContainer()->get('kiskis_factory');
        $kiskis = $kiskisFactory->getKiskis();
        $kiskis->setWeight($weight);
        $kiskis->setColour($colour);

        // Uzsaugoma i duombaze
        $manager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $manager->persist($kiskis);
        $manager->flush();


    }
}