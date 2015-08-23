<?php

class IngredientController extends BaseController {

    public static function index() {
        $ingredients = Raaka_aine::all();
        View::make('ingredient/index.html', array('ingredients' => $ingredients));
    }

    public static function show($nimi) {
        $ingredient = Raaka_aine::find($nimi);
        View::make('ingredient/show.html', array('ingredient' => $ingredient));
    }

    public static function create() {
        self::check_logged_in();
        View::make('ingredient/new.html');
    }

    public static function store() {
        self::check_logged_in();
        
        $params = $_POST;

        $attributes = array(
            'nimi' => $params['nimi'],
            'energiaa' => $params['energiaa'],
            'hiilihydraatteja' => $params['hiilihydraatteja'],
            'proteiineja' => $params['proteiineja'],
            'rasvaa' => $params['rasvaa']
        );
        
        $ingredient = new Raaka_aine($attributes);
        $errors = $ingredient->errors();
              
        if (count($errors) == 0) {
            $ingredient->save();
            Redirect::to('/ingredient/' . $ingredient->nimi, array('message' => 'Raaka-aine on lisätty keittokirjaan.'));
        } else {
            View::make('ingredient/new.html', 
                array('errors' => $errors, 'attributes' => $attributes));
        }
    }
    
    public static function edit($nimi){ 
        self::check_logged_in();
        
        $aine = Raaka_aine::find($nimi);
        View::make('ingredient/edit.html', array('attributes' => $aine));
    }
    
    public static function update($nimi){
        self::check_logged_in();
        
        $params = $_POST;
        
        $attributes = array(
            'nimi' => $nimi,
            'energiaa' => $params['energiaa'],
            'hiilihydraatteja' => $params['hiilihydraatteja'],
            'proteiineja' => $params['proteiineja'],
            'rasvaa' => $params['rasvaa']
        );
        
        $aine = new Raaka_aine($attributes);
        $errors = $aine->errors();
        
        if(count($errors) > 0){
            View::make('ingredient/edit.html', array('errors' => $errors, 'attributes' => $attributes));
        } else {
            $aine->update();
            
            Redirect::to('/ingredient/' . $aine->nimi, array('message' => 'Raaka-ainetta on muokattu onnistuneesti.'));
        }
    }
    
    public static function destroy($nimi){
        self::check_logged_in();
        
        $aine = new Raaka_aine(array('nimi' => $nimi));
        $aine->destroy();
        
        Redirect::to('/ingredient', array('message' => 'Raaka-aine on poistettu onnistuneesti.'));
    }

}
