<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
        $title = 'Home';
        $model = new ArtikelModel();
        $artikel = $model->findAll();

        return view('home', compact('artikel', 'title'));
    }
}
