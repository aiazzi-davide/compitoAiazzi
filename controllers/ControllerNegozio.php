<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ControllerNegozio
{
    public function getNegozio(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        $response->getBody()->write(json_encode($negozio));
        return $response;
    }
}
