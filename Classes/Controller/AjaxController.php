<?php
namespace AndreasWolf\BackendDemo\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AjaxController
{


    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function helloWorld(ServerRequestInterface $request, ResponseInterface $response)
    {
        // AJAX controllers that are called via the new dispatcher mechanism must always return JSON!
        // (see AjaxRequestHandler::dispatch())
        $response->getBody()->write(json_encode(['text' => 'Hello AJAX World']));

        return $response;
    }

}
