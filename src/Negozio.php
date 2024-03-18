<?php

class Negozio implements JsonSerializable
{
    protected $nome;
    protected $telefono;
    protected $indirizzo;
    protected $url;
    protected $p_iva;
    protected $ordini = [];
    protected $articoli = [];

    public function __construct()
    {
        $this->nome = "Negozio1";
        $this->telefono = "1234567890";
        $this->indirizzo = "Via Roma 1";
        $this->url = "www.negozio1.it";
        $this->p_iva = "12345678901";

        $ordine1 = new Ordini_fisici(1, "2021-01-01", 100, "Contanti");
        $ordine2 = new Ordini_fisici(2, "2021-01-02", 200, "Carta");
        $ordine3 = new Ordini_online(3, "2021-01-03", 300, "32.45.21.67", "123456");
        $ordine4 = new Ordini_online(4, "2021-01-04", 400, "27.34.112.56", "789012");

        $ordine1->addArticolo(new Articolo_venduto(1, 10, 5));
        $ordine1->addArticolo(new Articolo_venduto(2, 20, 10));
        $ordine2->addArticolo(new Articolo_venduto(3, 30, 15));

        $this->ordini = [$ordine1, $ordine2, $ordine3, $ordine4];

        $articolo1 = new Articolo(1, "Articolo1", 10);
        $articolo2 = new Articolo(2, "Articolo2", 20);
        $articolo3 = new Articolo(3, "Articolo3", 30);

        $this->articoli = [$articolo1, $articolo2, $articolo3];
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getPiva()
    {
        return $this->p_iva;
    }

    public function getOrdini()
    {
        return $this->ordini;
    }

    public function jsonSerialize()
    {
        $attrs = [];
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
            $attrs[$name] = $this->{$name};
        }
        $attrs['ordini'] = $this->ordini;
        return $attrs;
    }

}