<?php

class Resepti extends BaseModel{
    
    public $id, $ruokalaji, $luokka, $annosmaara, $lahde, $kuva, $lisatty;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function all(){
        $query = DB::connection()->prepare('SELECT * FROM Resepti');
        $query->execute();
        
        $rows = $query->fetchAll();
        $reseptit = array();
        
        foreach ($rows as $row){
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
    
    public static function find($id){
        $query = DB::connection()->prepare('SELECT * FROM Resepti WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        
        if($row){
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
}