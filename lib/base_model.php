<?php

class BaseModel {

    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null) {
        // Käydään assosiaatiolistan avaimet läpi
        foreach ($attributes as $attribute => $value) {
            // Jos avaimen niminen attribuutti on olemassa...
            if (property_exists($this, $attribute)) {
                // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
                $this->{$attribute} = $value;
            }
        }
    }

    public function errors() {
        // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
        $errors = array();

        foreach ($this->validators as $validator) {
            // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon

            $validator_errors = $this->{$validator}();

            $errors = array_merge($errors, $validator_errors);
        }

        return $errors;
    }

    public function validate_ruokalaji() {
        $errors = array();
        if ($this->ruokalaji == '' || $this->ruokalaji == null) {
            $errors[] = 'Ruokalaji ei saa olla tyhjä!';
        }
        if (strlen($this->ruokalaji) < 3) {
            $errors[] = 'Ruokalajin pituuden tulee olla vähintään kolme merkkiä';
        }

        return $errors;
    }
    
    public function validate_luokka() {
        $errors = array();
        if ($this->luokka == 'Valitse...') {
            $errors[] = 'Valitse luokka';
        }
        return $errors;
    }

    public function validate_annosmaara() {
        $errors = array();
        if ($this->annosmaara == '' || $this->annosmaara == null) {
            $errors[] = 'Annosmäärä ei saa olla tyhjä!';
        }if (!is_numeric($this->annosmaara)) {
            $errors[] = 'Annosmäärän tulee olla numero';
        }

        return $errors;
    }

    public function validate_nimi() {
        $errors = array();
        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Nimi ei saa olla tyhjä!';
        }
        if (strlen($this->nimi) < 3) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä.';
        }
        
        return $errors;
    }
    
    public function validate_energia() {
        $errors = array();
        
        if ($this->energiaa == '' || $this->energiaa == null) {
            $errors[] = 'Energian määrä ei saa olla tyhjä!';
        }
        if (!is_numeric($this->energiaa)){
            $errors[] = 'Energian määrän tulee olla numero';
        }
        return $errors;
    }

    public function validate_hiili() {
        $errors = array();
        if ($this->hiilihydraatteja == '' || $this->hiilihydraatteja == null) {
            $errors[] = 'Hiilihydraattien määrä ei saa olla tyhjä!';
        }
        if (!is_numeric($this->hiilihydraatteja)){
            $errors[] = 'Hiilihydraattien määrän tulee olla numero';
        }
        return $errors;
    }
    
     public function validate_prote() {
        $errors = array();
        if ($this->proteiineja == '' || $this->proteiineja == null) {
            $errors[] = 'Proteiinien määrä ei saa olla tyhjä!';
        }
        if (!is_numeric($this->proteiineja)){
            $errors[] = 'Proteiinien määrän tulee olla numero';
        }
        return $errors;
    }
    
     public function validate_rasva() {
        $errors = array();
        if ($this->rasvaa == '' || $this->rasvaa == null) {
            $errors[] = 'Rasvan määrä ei saa olla tyhjä!';
        }
        if (!is_numeric($this->rasvaa)){
            $errors[] = 'Rasvan määrän tulee olla numero';
        }
        return $errors;
    }
}
