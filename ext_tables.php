<?php

// Registering the legacy module
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
    // the main module to place the module into: "system", "web", "tools", "file", "user"
    'system',

    // the name of the sub module, can be freely chosen
    'BackendDemo',

    // the position of the new item: "top", "bottom", "after:<item>", "before:<item>"
    // the default value is "bottom"
    'top',

    // the path to the module; now deprecated, instead use the routeTarget option specified below
    '',

    // additional module configuration
    [
        // the action/method that should be invoked
        // => the action must accept a PSR 7 request and response as parameters and return the response again
        'routeTarget' => \AndreasWolf\BackendDemo\Controller\RoutedModuleController::class . '::processRequest',

        // permissions for the module
        // if "admin", only administrators will have access
        // if "user" or "group" (or both separated with ","), the module can be enabled for groups/users in their
        // configuration
        'access' => 'group,user',

        // the module name, composed of the main and sub module defined above;
        // this key is e.g. used for routing requests to the backend form
        'name' => 'system_BackendDemo',

        'labels' => [
            'tabs_images' => [
                // the icon for the module menu item
                'tab' => 'EXT:setup/Resources/Public/Icons/module-setup.svg',
            ],
            // Pointer to the module locallang file. This must contain three keys for the menu entry
            //   - mlang_labels_tablabel
            //   - mlang_labels_tabdescr
            //   - mlang_tabs_tab
            'll_ref' => 'LLL:EXT:backend_demo/Resources/Private/Language/locallang_mod.xlf',
        ],
    ]
);
