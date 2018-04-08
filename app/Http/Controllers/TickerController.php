<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use App\Ticker;
use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;

class TickerController extends CrudController
{
    /**
     * Mode
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @param App\Ticker $obj
     * @return void
     */
    public function __construct(Ticker $obj)
    {
        //$this->middleware('auth');
        $this->obj = $obj;
        $this->slug = 'ticker';
        $this->title = 'Ticker';
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = $this->obj->all();

        return $this->render('index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->render('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate($this->obj->getValidations());
  
        $this->save($request, $this->obj);

        return redirect('/ticker');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Ticker $obj
     * @return \Illuminate\Http\Response
     */
    public function show(Ticker $obj)
    {
        //
        $client = ApiClientFactory::createApiClient();
        //$historicalData = $client->getHistoricalData($obj->yahoo_symbol, ApiClient::INTERVAL_1_DAY, new \DateTime("-1000 days"), new \DateTime("-990 days"));
        $quote = $client->getQuote($obj->yahoo_symbol);

        return $this->render('show', [ 'obj' => $obj, 'quote' => $quote ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Ticker $obj
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticker $obj)
    {
        //

        return $this->render('edit', [ 'obj' => $obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param App\Ticker $obj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticker $obj)
    {
        //
        $this->save($request, $obj);

        return redirect($this->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Ticker $obj
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticker $obj)
    {
        $obj->delete();
        return redirect('/ticker')->with('success','Information has been deleted');
        
    }
}
