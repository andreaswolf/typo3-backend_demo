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

        // this array is actually a bit more complicated than it should be; TODO where is this information processed?
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

// Registering the Extbase module
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    // The extension name (Vendor.ExtensionKey)
    'AndreasWolf.BackendDemo',

    // the extension key, main module and sub module form the namespace for module parameters
    //  => tx_backenddemo_system_backenddemoextbasebackenddemo
    //  => tx_<extkey>_<main module>_<extkey><sub module>
    // the module key "M" used by the backend routing is also directly derived from this information; in our case, it is
    // "system_BackendDemoExtbasebackenddemo"

    // the main module
    'system',

    // the sub module
    'ExtbaseBackendDemo',

    // place this module after the first module defined above
    'after:BackendDemo',

    // the controllers and their actions enabled for this module; actions not available here will trigger an error
    // when called;
    // there is only one array of actions as all actions in backend modules are uncached
    [
        'ExtbaseModule' => 'demo, second, list, flashmessage, form, formTarget'
    ],

    [
        // alternatively defined 'user,group' (or one of these only) to allow restricting access on user and/or group
        // basis
        'access' => 'admin',

        'icon' => 'EXT:setup/Resources/Public/Icons/module-setup.svg',
        // the labels have fixed keys: mlang_tabs_tab, mlang_labels_tablabel, mlang_labels_tabdescr
        // (works exactly like the ll_ref in normal modules, see above)
        'labels' => 'LLL:EXT:backend_demo/Resources/Private/Language/locallang_extbase_mod.xlf',

        // access to workspaces could also be configured here:
        //   'workspaces' => 'online, offline, custom'
        // 'online' is the default live workspace, 'offline' the default draft WS and 'custom' are all other WSes

        // this controls if the page or file tree is shown
        // this setup here will completely hide the tree even if the module is situated in "web", where the page
        // tree would be shown; an example is the module in "EXT:forms"
        'navigationComponentId' => '',
        'inheritNavigationComponentFromMainModule' => false
        // to show the page tree, replace the two lines by
        //   'navigationComponentId' => 'typo3-pagetree'
        // "typo3-pagetree" is the DOM ID of the page tree.
    ]
);