<?php

class RecipeController extends BaseController{
    
    public static function index(){
        $recipes = Resepti::all();
        View::make('recipe/index.html', array('recipes' => $recipes));
    }
    
    public static function show($id){
        $recipe = Resepti::find($id);
        View::make('recipe/show.html', array('recipe' => $recipe));
    }
    
    public static function create(){
        View::make('recipe/new.html');
    }
    
    public static function store(){
        $params = $_POST;
        
        $recipe = new Resepti(array(
            'ruokalaji' => $params['ruokalaji'],
            'luokka' => $params['luokka'],
            'annosmaara' => $params['annosmaara'],
            'lahde' => $params['lahde'],
            'kuva' => $params['kuva'],
            'lisatty' => date("j n o")
        ));
        
        Kint::dump($params);
        
        $recipe->save();
        Redirect::to('/recipe/' . $recipe->id, array('message' => 'Resepti on lisätty keittokirjaan.'));
        exit();
        
    }
    
   
}