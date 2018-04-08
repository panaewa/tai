<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;

class YahooDataController extends Controller
{
    //
    public function index($quote = 'TEF.MC')
    {
        $client = ApiClientFactory::createApiClient();
        $historicalData = $client->getHistoricalData($quote, ApiClient::INTERVAL_1_DAY, new \DateTime("-200 days"), new \DateTime("today"));
        return view('data.result',compact('historicalData'));
    }    
    
}
