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
        $historicalData = $client->getHistoricalData("TEF.MC", ApiClient::INTERVAL_1_DAY, new \DateTime("-1000 days"), new \DateTime("-990 days"));
        $quote = $client->getQuote($quote);
        return view('data.result',compact('quote'));
    }    
    
}
