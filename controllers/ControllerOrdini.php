<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ControllerOrdini
{
    
    public function getOrdini(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        if (isset($args['id'])) {
            if ($negozio->getOrdine($args['id']) == null) {
                return $this->write($response, ['message' => 'Ordine non trovato'], 404);
            } else {
                return $this->write($response, $negozio->getOrdine($args['id']), 200);
            }
        } else {
            return $this->write($response, $negozio->getOrdini(), 200);
        }
    }

    public function getArticoliVenduti(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        if ($negozio->getArticoliVenduti($args['id']) == null) {
            return $this->write($response, ['message' => 'Articoli venduti non trovati'], 404);
        } else {
            return $this->write($response, $negozio->getArticoliVenduti($args['id']), 200);
        }
    }

    public function getArticoloVenduto(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        if ($negozio->getArticoloVenduto($args['id'], $args['idArt']) == null) {
            return $this->write($response, ['message' => 'Articolo venduto non trovato'], 404);
        } else {
            return $this->write($response, $negozio->getArticoloVenduto($args['id'], $args['idArt']), 200);
        }
    }

    public function verifica(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        if ($negozio->getOrdine($args['id']) == null) {
            return $this->write($response, ['message' => 'Ordine non trovato'], 404);
        } else {
            if ($negozio->getImportoTotale($args['id']) == $negozio->getSommaPrezziVendita($args['id'])){
                return $this->write($response, ['verifica' => true], 200);
            } else {
                return $this->write($response, ['verifica' => false], 200);
            }
        }
    } 

    public function sconto(Request $request, Response $response, $args)
    {
        $negozio = new Negozio();
        if ($negozio->getOrdine($args['id']) == null) {
            return $this->write($response, ['message' => 'Ordine non trovato'], 404);
        } else {
            return $this->write($response, ['sconto' => $negozio->getSconto($args['id'])], 200);
        }
    }

    public function write (Response $response, $data, $status) {
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
        return $response->withStatus($status)->withHeader('Content-type', 'application/json');
    }
}
