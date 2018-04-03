<?php

namespace App\Http\Controllers;

use App\MeffData;
use Illuminate\Http\Request;
use Chumper\Zipper\Zipper;

class MeffCronController extends Controller
{

    public function download()
    {
        
        $filename = '/RV180403.zip';
        $tempImage = tempnam(sys_get_temp_dir(), $filename);

        dd(tempnam(sys_get_temp_dir(), $filename));
        
        copy('http://www.meff.es/docs/Ficheros/Descarga/dRV/RV180403.zip', $tempImage);   

        Zipper::make('test.zip')->folder('test')->extractTo('foo');     

        return view('data.result');
    }
}
