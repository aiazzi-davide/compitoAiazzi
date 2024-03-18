<?php
class Articolo
{
    protected $id;
    protected $nome;
    protected $descrizione;
    protected $prezzo_di_listino;

    public function __construct($id, $nome, $descrizione, $prezzo_di_listino)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descrizione = $descrizione;
        $this->prezzo_di_listino = $prezzo_di_listino;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescrizione()
    {
        return $this->descrizione;
    }
    
}
