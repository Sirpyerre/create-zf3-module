<?php

namespace Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class Command extends SymfonyCommand
{
    public function __construct()
    {
        parent::__construct();
    }

    private $moduleName;
    private $pathToApplication;

    protected $structModule = [
        'config',
        'src/Controller',
        'src/Controller/Factory',
        'src/Entity',
        'src/Repository',
        'src/Form',
        'src/Form/Factory',
        'src/Service',
        'src/Service/Factory',
        'view'
    ];

    protected $files = [
        'src' => 'Module',
        'config' => 'module.config',
        'src/Controller' => 'IndexController',
        'src/Controller/Factory' => 'IndexControllerFactory',
        'view' => 'index'
    ];

    protected function createModule(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(['Create a new module:']);

        $this->moduleName = $input->getArgument('moduleName');
        $this->pathToApplication = $input->getArgument('pathToApplication');

        $this->createStructure();

        $this->createFiles();

        $output->writeln(["\n\nNext steps: \n
        1.- Add to array in modules.config.php, the new module. 
        2.- Edit composer.json and add \"{$this->moduleName}\\\\\": \"module/{$this->moduleName}/src/\", in autoload \n
        3.- In a terminal: composer dump-autoload.\n"]);

    }

    public function createStructure()
    {
        $structure = $this->structModule;
        $currentDir = $this->pathToApplication . '/module';
        foreach ($structure as $dir) {

            if ($dir === 'view') {
                $dir = "view/" . $this->ViewDirectoryToSlugify() . '/index/';
            }

            $path = $currentDir . '/' . $this->moduleName . '/' . $dir;


            if (!file_exists($path)) {
                echo "path: $path\n";
                mkdir($path, 0777, true);
            }
        }
    }

    public function createFiles()
    {
        $currentDir = __DIR__;
        $destinationPath = $this->pathToApplication . '/module';

        foreach ($this->files as $directory => $file) {
            $path = "$destinationPath/$this->moduleName";

            $path .= $this->FixViewDirectory($directory);

            if ($file === 'index'){
                $path .= "$file.phtml";
            } else {
                $path .= "$file.php";
            }

            if (!file_exists($path)) {
                echo 'file:' . $path . "\n";
//                touch($path);
                $template = file_get_contents("$currentDir/Resources/$file.txt");
                $template = str_replace('__Application__', $this->moduleName, $template);
                file_put_contents($path, $template);

            }
        }
    }

    /**
     * @return mixed
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }

    /**
     * @param mixed $moduleName
     */
    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
    }

    private function FixViewDirectory($directory)
    {
        $path = '/';
        $moduleName = $this->ViewDirectoryToSlugify();

        switch ($directory) {
            case '/':
                return $path;
            case 'view':
                $path = '/view/' . $moduleName . '/index/';
                return $path;
            default:
                return "/$directory/";

        }
    }

    /*
     * Slugify ModuleName
    */
    private function ViewDirectoryToSlugify()
    {
        $moduleNameSplit = preg_split('#([A-Z][^A-Z]*)#', $this->moduleName, null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $wordsToLower = array_map('strtolower', $moduleNameSplit);

        return implode('-', $wordsToLower);
    }

}
