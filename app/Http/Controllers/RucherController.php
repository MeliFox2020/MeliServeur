<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RucherController extends Controller {

public function insertform(){
return view('rucher_create');
}

public function insert(Request $request){
$nom = $request->input('nom');
$lon = $request->input('lon');
$lat = $request->input('lat');
$data=array('Nom'=>$nom,"Longitude"=>$lon,"Lattitude"=>$lat);
DB::table('Rucher')->insert($data);
echo "Record inserted successfully.<br/>";
echo '<a href = "/insert">Click Here</a> to go back.';
}
}
