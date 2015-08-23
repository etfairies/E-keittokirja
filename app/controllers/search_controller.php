<?php

class SearchController extends BaseController {
    
    public static function results() {
        $param = $_POST;
        
        $search = $param['search'];
        $reseptit = Resepti::search($search);
        
        View::make('search/search.html', array('search' => $search, 'recipes' => $reseptit));
    }
}