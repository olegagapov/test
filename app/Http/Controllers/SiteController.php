<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function main($id = '', $i = 0)
    {
         $ii = ''; if($i !== 0) $ii = $i;
        return view('main', [
            //'name' => $name,
                        'id' => $id,
            'i' => $i,
            'ii' => $ii
        ]);
    }

    public function pages($head, $content = 'default', $footer = 'default'){
        return view('main', [
            'head' => $head.'  head pages',
            'content' => $content.'  content pages',
            'footer' => $footer.' footer pages'
        ]);
    }
}