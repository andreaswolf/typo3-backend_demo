<?php
namespace AndreasWolf\BackendDemo\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class RoutedModuleController
{

    /**
     * Request dispatching method. This is set in the module configuration as the route target and called by the module
     * dispatcher.
     *
     * @param ServerRequestInterface $request PSR7 Request Object
     * @param ResponseInterface $response PSR7 Response Object
     *
     * @return ResponseInterface
     *
     * @throws \InvalidArgumentException In case an action is not callable
     */
    public function processRequest(ServerRequestInterface $request, ResponseInterface $response)
    {
        // The response object is immutable as per PSR-7. Therefore we must return it here
        $response->getBody()->write('This is a demo module');
        return $response;
    }

}
