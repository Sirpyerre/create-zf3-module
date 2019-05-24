# Tool for create Module skeleton for Zend Framework 3

`./console.php createModule <moduleName> <pathToApplication>`

This command create the following directories in specific path:

`APPLICATION_ROOT/NewAwesomeModule/config`,

`APPLICATION_ROOT/NewAwesomeModule/src/Controller`,

`APPLICATION_ROOT/NewAwesomeModule/src/Controller/Factory`,

`APPLICATION_ROOT/NewAwesomeModule/src/Entity`,

`APPLICATION_ROOT/NewAwesomeModule/src/Repository`,

`APPLICATION_ROOT/NewAwesomeModule/src/Form`,

`APPLICATION_ROOT/NewAwesomeModule/src/Form/Factory`,

`APPLICATION_ROOT/NewAwesomeModule/src/Service`,

`APPLICATION_ROOT/NewAwesomeModule/src/Service/Factory`,

`APPLICATION_ROOT/NewAwesomeModule/view`


### And generate php files in:

`APPLICATION_ROOT/NewAwesomeModule/src/Module.php`

`APPLICATION_ROOT/NewAwesomeModule/config/module.config.php`

`APPLICATION_ROOT/NewAwesomeModule/src/Controller/IndexController.php`

`APPLICATION_ROOT/NewAwesomeModule/src/Controller/Factory/IndexControllerFactory.php`

`APPLICATION_ROOT/NewAwesomeModule/view/new-awesome-module/index/index.phtml`

### Next steps: 

        1.- Add to array in modules.config.php, the new module. 
        2.- Edit composer.json and add "NewAwesomeModule\\": "module/NewAwesomeModule/src/", in autoload 

        3.- In a terminal: composer dump-autoload.
