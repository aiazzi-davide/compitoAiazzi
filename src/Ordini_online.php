<?php
class Ordini_online extends Ordini implements JsonSerializable
{
    protected $indirizzo_ip;
    protected $codice_di_autorizzazione;

    public function __construct($numero_ordine, $data_ordine, $importo_totale, $indirizzo_ip, $codice_di_autorizzazione)
    {
        parent::__construct($numero_ordine, $data_ordine, $importo_totale);
        $this->indirizzo_ip = $indirizzo_ip;
        $this->codice_di_autorizzazione = $codice_di_autorizzazione;
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

    public function getIndirizzoIp()
    {
        return $this->indirizzo_ip;
    }

    public function getCodiceDiAutorizzazione()
    {
        return $this->codice_di_autorizzazione;
    }

}
