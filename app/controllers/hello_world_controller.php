<?php


  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
//   	  View::make('home.html');
        echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      $wokki = new Resepti(array(
          'ruokalaji' => '',
          'annosmaara' => ''
      ));
      $errors = $wokki->errors();
      
      Kint::dump($errors);
    }
    
    public static function recipe_list(){
        View::make('suunnitelmat/recipe_list.html');
    }
    
    public static function recipe_show(){
        View::make('suunnitelmat/recipe_show.html');
    }
    
    public static function recipe_edit(){
        View::make('suunnitelmat/recipe_edit.html');
    }
    
    public static function login(){
        View::make('suunnitelmat/login.html');
    }
  }
