<?php

class Raaka_aine extends BaseModel {

    public $nimi, $energiaa, $hiilihydraatteja, $proteiineja, $rasvaa;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = 
                array('validate_nimi', 'validate_energia', 'validate_hiili', 'validate_prote', 'validate_rasva');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Raaka_aine');
        $query->execute();

        $rows = $query->fetchAll();
        $aineet = array();

        foreach ($rows as $row) {
            $aineet[] = new Raaka_aine(array(
                'nimi' => $row['nimi'],
                'energiaa' => $row['energiaa'],
                'hiilihydraatteja' => $row['hiilihydraatteja'],
                'proteiineja' => $row['proteiineja'],
                'rasvaa' => $row['rasvaa']
            ));
        }
        return $aineet;
    }

    public static function find($nimi) {
        $query = DB::connection()->prepare('SELECT * FROM Raaka_aine WHERE nimi = :nimi LIMIT 1');
        $query->execute(array('nimi' => $nimi));
        $row = $query->fetch();

        if ($row) {
            $aine = new Raaka_aine(array(
                'nimi' => $row['nimi'],
                'energiaa' => $row['energiaa'],
                'hiilihydraatteja' => $row['hiilihydraatteja'],
                'proteiineja' => $row['proteiineja'],
                'rasvaa' => $row['rasvaa']
            ));

            return $aine;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare
                ('INSERT INTO Raaka_aine (nimi, energiaa, hiilihydraatteja, proteiineja, rasvaa) '
                . 'VALUES (:nimi, :energiaa, :hiilihydraatteja, :proteiineja, :rasvaa) RETURNING nimi');

        $query->execute(array(
            'nimi' => $this->nimi,
            'energiaa' => $this->energiaa,
            'hiilihydraatteja' => $this->hiilihydraatteja,
            'proteiineja' => $this->proteiineja,
            'rasvaa' => $this->rasvaa));
    }
    
    public function update() {
        $query = DB::connection()->prepare
                ('UPDATE Raaka_aine SET
                    energiaa = :energiaa, 
                    hiilihydraatteja = :hiilihydraatteja,
                    proteiineja = :proteiineja,
                    rasvaa = :rasvaa
                WHERE nimi = :nimi');

        $query->execute(array(
            'nimi' => $this->nimi,
            'energiaa' => $this->energiaa,
            'hiilihydraatteja' => $this->hiilihydraatteja,
            'proteiineja' => $this->proteiineja,
            'rasvaa' => $this->rasvaa));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Raaka_aine WHERE nimi = :nimi');
        
        $query->execute(array('nimi' => $this->nimi));
    }

}
