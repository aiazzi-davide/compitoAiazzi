<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ControllerIndex
{
    public function getIndex(Request $request, Response $response, $args)
    {
        $response->getBody()->write("Benvenuto nel negozio online! <br>
        <p>GET /negozio -> Dati del negozio <br>

        GET /articoli -> Array di tutti gli articoli del negozio <br>
        GET /articoli/{id}  -> Dati completi dell'articolo  <br>
        GET /ordini -> Array di tutti gli ordini <br>
        GET /ordini/{numero_ordine}  -> Dati completi dell'ordine <br>
        GET /ordini/{numero_ordine}/articoli_venduti  -> Elenco degli articoli venduti nell'ordine <br>
        GET /ordini/{numero_ordine}/articoli_venduti/{id}  -> Dettagli dell'articolo venduto nell'ordine (id dell'articolo, prezzo di vendita, quantità acquistata) <br>
        GET /ordini/{numero_ordine}/verifica  -> Risultato booleano per verificare se l'importo_totale memorizzato nell'ordine corrisponde effettivamente alla somma dei prezzi di vendita degli articoli venduti. <br>
        GET /ordini/{numero_ordine}/sconto ->  L'importo dell'eventuale sconto per l'ordine, ovvero la differenza tra i la somma dei prezzi di listino e la somma dei prezzi di vendita </p>");
        return $response;
    }
}