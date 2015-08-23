<?php

class Ainesosa extends BaseModel {

    public $resepti_id, $maara, $raaka_aine;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public function allRelatedToRecipe($resepti_id) {
        $query = DB::connection()->prepare('SELECT * FROM Ainesosa WHERE resepti_id = :resepti_id');
        $query->execute(array('resepti_id' => $resepti_id));

        $rows = $query->fetchAll();
        $ainesosat = array();

        foreach ($rows as $row) {
            $ainesosat[] = new Ainesosa(array(
                'resepti_id' => $row['resepti_id'],
                'maara' => $row['maara'],
                'raaka_aine' => $row['raaka_aine']
            ));
        }
        
        return $ainesosat;
    }

    public function save() {
        $query = DB::connection()->prepare
                ('INSERT INTO Ainesosa (resepti_id, maara, raaka_aine) VALUES (:resepti_id, :maara, :raaka_aine)');

        $query->execute(array(
            'resepti_id' => $this->resepti_id,
            'maara' => $this->maara,
            'raaka_aine' => $this->raaka_aine));
    }

}
