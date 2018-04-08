<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticker extends Model
{ 
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','esin','google_symbol','url','yahoo_symbol'];

    protected $cofig = [
        'fields' => [
            'name' => [
                'view' => 'all'
            ],
            'esin' => [
                'view' => 'all'
            ],
            'google_symbol' => [
                'view' => 'all'
            ],
            'url' => [
                'view' => [
                    'edit',
                    'create'
                ]
            ],
            'yahoo_symbol' => [
                'view' => [
                    'all',
                ]
            ]
        ]
    ];




    public function  getColumns($view)
    {
        switch ($view) {
            case 'index':
                return [
                    'name',
                    'esin',
                    'google_symbol',
                    'yahoo_symbol'
                ];
                break;
            
            default:
                return [
                    'name',
                    'esin',
                    'google_symbol',
                    'yahoo_symbol',
                    'url'
                ];
                break;
        }

    }

    public function getValidations()
    {
        return [
            'name' => 'required',
            'esin' => 'required|unique:tickers',
            'google_symbol' => 'required',
            'url' => 'required'
        ];
    }
}
