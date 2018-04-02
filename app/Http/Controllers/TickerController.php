<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticker;

class TickerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = new Ticker();

        $list = $t->all();
        $columns = $t->getColumns();
        $slug = 'ticker';
        $title = 'Ticker';

        return view('ticker.index', compact('list','columns','slug','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ticker.create');
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
        $validatedData = $request->validate([
            'name' => 'required',
            'esin' => 'required|unique:tickers',
            'google_symbol' => 'required'
        ]);

        $ticker = new Ticker();
  
        $ticker->create([
            'name' => $request->get('name'),
            'esin' => $request->get('esin'),
            'google_symbol' => $request->get('google_symbol')
        ]);
        return redirect('/ticker');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ticker = Ticker::find($id);

        return view('ticker.show', compact('ticker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ticker = Ticker::find($id);

        return view('ticker.edit', compact('ticker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ticker= Ticker::find($id);
        $ticker->name           = $request->get('name');
        $ticker->esin           = $request->get('esin');
        $ticker->google_symbol  = $request->get('google_symbol');
        $ticker->save();
        return redirect('ticker');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ticker = Ticker::find($id);

        $ticker->delete();

        return redirect('/ticker')->with('success','Information has been deleted');
        
    }
}
