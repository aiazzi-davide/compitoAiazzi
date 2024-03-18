<?php
class Articolo_venduto implements JsonSerializable
{
    protected $id;
    protected $prezzo_di_vendita;
    protected $quantita_acquistata;

    public function __construct($id, $prezzo_di_vendita, $quantita_acquistata)
    {
        $this->id = $id;
        $this->prezzo_di_vendita = $prezzo_di_vendita;
        $this->quantita_acquistata = $quantita_acquistata;
    }

    public function jsonSerialize()
    {
        $attrs = [];
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
            $attrs[$name] = $this->{$name};
        }
        return $attrs;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrezzoDiVendita()
    {
        return $this->prezzo_di_vendita;
    }

    public function getQuantitaAcquistata()
    {
        return $this->quantita_acquistata;
    }

    public function getImportoTotale()
    {
        return $this->prezzo_di_vendita * $this->quantita_acquistata;
    }
}
