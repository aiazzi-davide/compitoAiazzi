<?php
abstract class Ordini {
    protected $numero_ordine;
    protected $data_ordine;
    protected $importo_totale;
    protected $articoli_venduti = [];

    public function __construct($numero_ordine, $data_ordine, $importo_totale)
    {
        $this->numero_ordine = $numero_ordine;
        $this->data_ordine = $data_ordine;
        $this->importo_totale = $importo_totale;
    }

    public function addArticolo(Articolo $articolo)
    {
        $this->articoli_venduti[] = $articolo;
    }

    public function getNumeroOrdine()
    {
        return $this->numero_ordine;
    }

    public function getDataOrdine()
    {
        return $this->data_ordine;
    }

    public function getImportoTotale()
    {
        return $this->importo_totale;
    }

    public function getArticoliVenduti()
    {
        return $this->articoli_venduti;
    }
}