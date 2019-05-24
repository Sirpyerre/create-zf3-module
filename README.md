# Tool for create Module skeleton for Zend Framework 3

`./console.php createModule <moduleName> <pathToApplication>`

This command create the following directories in specific path:

`APPLICATION_ROOT/config`,

`APPLICATION_ROOT/src/Controller`,

`APPLICATION_ROOT/src/Controller/Factory`,

`APPLICATION_ROOT/src/Entity`,

`APPLICATION_ROOT/src/Repository`,

`APPLICATION_ROOT/src/Form`,

`APPLICATION_ROOT/src/Form/Factory`,

`APPLICATION_ROOT/src/Service`,

`APPLICATION_ROOT/src/Service/Factory`,

`APPLICATION_ROOT/vie`w


And generate php files in:

`APPLICATION_ROOT/src/Module.php`

`APPLICATION_ROOT/config/module.config.php`

`APPLICATION_ROOT/src/Controller/IndexController.php`

`APPLICATION_ROOT/src/Controller/Factory/IndexControllerFactory.php`

`APPLICATION_ROOT/view/new-awesome-module/index/index.phtml`

Next steps: 

        1.- Add to array in modules.config.php, the new module. 
        2.- Edit composer.json and add "NewAwesomeModule\\": "module/NewAwesomeModule/src/", in autoload 

        3.- In a terminal: composer dump-autoload.
