<?php
namespace Command\Clicommand\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Hello extends Command
{
   protected function configure()
   {
       $this->setName('example:hello');
       $this->setDescription('Demo command line');
       
       parent::configure();
   }
   protected function execute(InputInterface $input, OutputInterface $output)
   {
       $output->writeln("Custom command executed!..");
   }
}