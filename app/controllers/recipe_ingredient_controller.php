<?php

class RecipeIngredientController extends BaseController {

    public static function create($id) {
        self::check_logged_in();
        $recipe = Resepti::find($id);
        $aineet = Raaka_aine::all();

        View::make('recipe_ingredient/new.html', array('recipe' => $recipe, 'aineet' => $aineet));
    }

    public static function store($resepti_id, $maara, $raaka_aine) {
        
        $attributes = array(
            'resepti_id' => $resepti_id,
            'maara' => $maara,
            'raaka_aine' => $raaka_aine
        );

        $ainesosa = new Ainesosa($attributes);

        $ainesosa->save();     
    }

    public static function storeNew() {
        self::check_logged_in();

        $params = $_POST;
        
        $attributes = array(
            'resepti_id' => $params['resepti_id'],
            'maara' => $params['maara'],
            'raaka_aine' => $params['raaka_aine']
        );

        $ainesosa = new Ainesosa($attributes);

        $ainesosa->save(); 
        Redirect::to('/recipe/' . $ainesosa->resepti_id, array('message' => 'Ainesosa on lisätty reseptiin.'));
    }

}
