<?php

class User extends BaseModel {

    public $id, $nimi, $salasana;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function find($id){
        $query = DB::connection()->prepare('SELECT * FROM Kokki WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'salasana' => $row['salasana']
            ));

            return $user;
        }
        return null;
    }
    
    public static function authenticate($nimi, $salasana) {
        $query = DB::connection()->prepare('SELECT * FROM Kokki WHERE nimi = :nimi AND salasana = :salasana LIMIT 1', array('nimi' => $nimi, 'salasana' => $salasana));
        $query->execute(array(
            'nimi' => $nimi,
            'salasana' => $salasana
        ));
        
        $row = $query->fetch();

        if ($row) {
            $user = new User(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'salasana' => $row['salasana']
            ));
            return $user;
        } else {
            return null;
        }
    }

}
