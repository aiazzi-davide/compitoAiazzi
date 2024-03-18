<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ControllerArticoli
{
    public function getArticoli(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        if (isset($args['id'])) {
            if ($negozio->getArticolo($args['id']) == null) {
                return $this->write($response, ['message' => 'Articolo non trovato'], 404);
            } else {
                return $this->write($response, $negozio->getArticolo($args['id']), 200);
            }
        } else {
            return $this->write($response, $negozio->getArticoli(), 200);
        }
    }

    public function write (Response $response, $data, $status) {
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
        return $response->withStatus($status)->withHeader('Content-type', 'application/json');
    }
}
