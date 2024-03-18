<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ControllerNegozio
{
    public function getNegozio(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        return $this->write($response, $negozio, 200);
    }

    public function write (Response $response, $data, $status) {
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
        return $response->withStatus($status)->withHeader('Content-type', 'application/json');
    }
}
