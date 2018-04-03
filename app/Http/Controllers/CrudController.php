<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{

    /**
     * Object Repository
     * 
     * @var App\Model
     */
    protected $obj;

    /**
     * Ticker Slug
     * 
     * @var string
     */
    protected $slug;

    /**
     * Ticker Title
     * 
     * @var string
     */
    protected $title;

    /**
     * Render view and add meta info
     *
     * @return \Illuminate\Http\Response
     */
    protected function render($view, $data = null)
    {
        if( is_null($data) ) $data = [];
        $data['slug'] = $this->slug;
        $data['title'] = $this->title;
        $data['columns'] = $this->obj->getColumns($view);            

        return view($this->slug.".".$view, $data);
    }

    protected function save(Request $request, $obj = null)
    {
        if ( !is_null($obj))
            $this->obj = $obj;
        foreach($this->obj->getColumns('save') as $col)
        {
            $obj->$col = $request->get($col);
        }
        $obj->save();

    }
}
