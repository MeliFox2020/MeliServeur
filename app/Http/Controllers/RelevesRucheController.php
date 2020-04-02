<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelevesRucheController extends Controller
{
    //
    function index(){        
        return \App\SigfoxMessage::all();
        }
    function getOne($id)
     { 
        return \App\SigfoxMessage::where('id', $id)->first();
        }
        function create(\Illuminate\Http\request $request){   
                 $sigfoxMessage = \App\SigfoxMessage::create([          
                       'device' => $request->input('device'), 
                       'data'   => $request->input('data'),
                       'time'   => $request->input('time'), 
                       ]);       
                     return $sigfoxMessage;    }
}
