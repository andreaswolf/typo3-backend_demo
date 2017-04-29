<?php

/**
 * Definitions for routes provided by EXT:backend
 * Contains all AJAX-based routes for entry points
 *
 * The classes referenced here don’t have to implement any specific interface. The methods should just return the
 * content
 */
return [
    // it is certainly advisable to somehow "namespace" both the identifiers and the paths here, so we don’t end up
    // with collisions (which are probably not checked in all places) and hard-to-debug errors
    'backenddemo_helloworld' => [
        'path' => '/backenddemo/helloworld',
        'target' => \AndreasWolf\BackendDemo\Controller\AjaxController::class . '::helloWorld'
    ],

];