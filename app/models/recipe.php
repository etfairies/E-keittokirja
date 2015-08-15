<?php

class Resepti extends BaseModel {

    public $id, $ruokalaji, $luokka, $annosmaara, $lahde, $kuva, $lisatty;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_ruokalaji', 'validate_luokka', 'validate_annosmaara');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Resepti');
        $query->execute();

        $rows = $query->fetchAll();
        $reseptit = array();

        foreach ($rows as $row) {
            $reseptit[] = new Resepti(array(
                'id' => $row['id'],
                'ruokalaji' => $row['ruokalaji'],
                'luokka' => $row['luokka'],
                'annosmaara' => $row['annosmaara'],
                'lahde' => $row['lahde'],
                'kuva' => $row['kuva'],
                'lisatty' => $row['lisatty']
            ));
        }

        return $reseptit;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Resepti WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $resepti = new Resepti(array(
                'id' => $row['id'],
                'ruokalaji' => $row['ruokalaji'],
                'luokka' => $row['luokka'],
                'annosmaara' => $row['annosmaara'],
                'lahde' => $row['lahde'],
                'kuva' => $row['kuva'],
                'lisatty' => $row['lisatty']
            ));

            return $resepti;
        }
        return null;
    }

    public function save() {
        $query = DB::connection()->prepare
                ('INSERT INTO Resepti (ruokalaji, luokka, annosmaara, lahde, kuva, lisatty) VALUES (:ruokalaji, :luokka, :annosmaara, :lahde, :kuva, NOW()) RETURNING id');

        $query->execute(array(
            'ruokalaji' => $this->ruokalaji,
            'luokka' => $this->luokka,
            'annosmaara' => $this->annosmaara,
            'lahde' => $this->lahde,
            'kuva' => $this->kuva));

        $row = $query->fetch();

        $this->id = $row['id'];
    }

    public function update() {
        $query = DB::connection()->prepare
                ('UPDATE Resepti SET 
                    ruokalaji = :ruokalaji, 
                    luokka = :luokka, 
                    annosmaara = :annosmaara,
                    lahde = :lahde,
                    kuva = :kuva
                WHERE id = :id');

        $query->execute(array(
            'id' => $this->id,
            'ruokalaji' => $this->ruokalaji,
            'luokka' => $this->luokka,
            'annosmaara' => $this->annosmaara,
            'lahde' => $this->lahde,
            'kuva' => $this->kuva));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Resepti WHERE id = :id');

        $query->execute(array(
            'id' => $this->id));
    }

}
