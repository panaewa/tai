<?php

namespace App\Http\Controllers;

use App\MeffData;
use Illuminate\Http\Request;
use Chumper\Zipper\Zipper;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use League\Csv\Reader;

class MeffCronController extends Controller
{
    protected $excel;

    protected $meffURL;

    public function __construct(\Maatwebsite\Excel\Excel $excel)
    {
        $this->excel = $excel;
        https://query1.finance.yahoo.com/v7/finance/download/%5EIBEX?period1=1520456470&period2=1523131270&interval=1d&events=history&crumb=ZJv5/A6ALmQ
    }

    public function download($quote = 'TEF.MC')
    {
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->request('GET','https://query.yahooapis.com/v1/public/yql', [
            'query' => [
                'q' => "select * from yahoo.finance.quotes where symbol in ('".$quote."')",
                'format' => 'json',
                'diagnostics' => 'true',
                'env' => 'store://datatables.org/alltableswithkeys',
                'callback' => ''
            ],
            'debug' => false,
            'allow_redirects' => true
        ]);
        $body = $response->getBody();

        $stringBody = (string) $body;

        echo($stringBody);
        return view('data.result');
    }

    public function downloadMeff($day = '180403')
    {
        $filename = 'RV'.$day;
        
        $client = new Client(); //GuzzleHttp\Client
        $client->request('GET', 'http://www.meff.es/docs/Ficheros/Descarga/dRV/'.$filename.'.zip', ['sink' => public_path()."/".$filename.".zip", 'debug' => true]);

        $zipper = new Zipper();
        $zipper->make(public_path()."/".$filename.".zip")->extractTo($filename);  
        $zipper->close();
        $zipper->make(public_path()."/".$filename."/today_rv.zip")->extractTo('DATA');
    }
}
