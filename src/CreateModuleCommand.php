<?php


namespace Console;

use Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateModuleCommand extends Command
{
    public function configure()
    {
        $this->setName('createModule')
            ->setDescription('Create Module structure')
            ->setHelp('This command allows create new module structure')
            ->addArgument('moduleName', InputArgument::REQUIRED, 'name of module')
            ->addArgument('pathToApplication', InputArgument::REQUIRED, 'path to application');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->createModule($input, $output);
    }
}