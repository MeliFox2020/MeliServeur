<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//pour gestion authorisation
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Traits\VoyagerUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

// modèles
use App\Rucher;
use App\Releverucher;

class PagesController extends Controller
{
    /**
     * page d'accueil
     */
    public function accueil()
    {
        $ruchers = rucher::all();
        $ruchersMap  = array();
        // construit le tableau des marqueurs de ruchers (pour la carte)
        foreach ($ruchers as $rrucher) {
            // crée le lien vers la fiche rucher
            $lien = "<a href=\"" . route('rucher_path', ['id' => $rrucher->id]) . "\">" . $rrucher->nom . "</a>";
            // récupère le relevé le plus récent
            $releverucher = $rrucher->dernierReleve();
            // crée le HTML d'info sur la rucher
            $infosrucher = "<p> température : " . $releverucher["temperature"] . "</p>";
            $infosrucher .= "<p> vit vent moy : " . $releverucher["vent_moy"] . "</p>";
            $infosrucher .= "<p> pression : " . $releverucher["pression"] . "</p>";
            // construit le descripteur de marqueur de rucher (c'est une chaîne de caractère)
            $infosMarker = $lien . $infosrucher;
            // ajoute le marqueur au tableau, avec sa géolocalisation
            $ruchersMap[$infosMarker] = array('lat' => $rrucher->latitude, 'lon' => $rrucher->longitude);
        }
        //var_dump($ruchersMap) ;
        return view('pages/accueil')->with('ruchers', $ruchers)->with('ruchersMap', $ruchersMap);
    }

    /**
     * Liste des ruchers
     */
    public function ruchers()
    {
        $ruchers = Rucher::all();
        return view('ruchers')->with('ruchers', $ruchers);
    }

    /**
     * Fiche détaillée d'une rucher
     */
    public function rucher($id)
    {
        $rucher = rucher::find($id);
        $releverucher = $rucher->dernierReleve();
        return view('pages/rucher')->with('rucher', $rucher)->with('releverucher', $releverucher);
    }

    /**
     * Affichage tabulaire des relevés rucher
     */
    public function relevesrucher($id)
    {
        $rucher = rucher::find($id);
        $relevesrucher = $rucher->releveruchers()->orderBy('timestamp', 'desc')->paginate(10);

        return view('pages/relevesrucher')->with('relevesrucher', $relevesrucher)->with('rucher', $rucher);
    }

    public function aPropos()
    {
        return view('pages/aPropos');
    }

    public function seDeconnecter()
    {

        return redirect('/')->with(Auth::logout());
    }

    /**
     * Affichage graphique des relevés rucher
     */
    public function relevesrucherGraphique($id)
    {

        $rucher = rucher::find($id);
        $relevesrucher = $rucher->releveruchers->take(50);

        // Variables pour graphique
        $tabTemp[] = array();
        $tabPression[] = array();
        $tabvitMoy[] = array();
        $tabvitMin[] = array();
        $tabvitMax[] = array();
        $tabTime[] = array();

        foreach ($relevesrucher as $rrucher) {
            $tabTemp[] = $rrucher->temperature;
            $tabPression[] = $rrucher->pression;
            $tabvitMoy[] = $rrucher->vent_moy;
            $tabvitMin[] = $rrucher->vent_min;
            $tabvitMax[] = $rrucher->vent_max;
            $tabTime[] = $rrucher->created_at;
        }

        $graphiquesVitesses =
            \Chart::title([
                'text' => $rucher->nom,
            ])
            ->chart([
                'type'     => 'line', // line , columnt ect
                'renderTo' => 'graphiquesVitesses', // render the chart into your div with id
            ])
            ->subtitle([
                'text' => '',
            ])
            ->colors([
                '#0c2959'
            ])
            ->xaxis([
                'categories' => $tabTime,
                'labels'     => [
                    'rotation'  => 15,
                    'align'     => 'top',
                    'formatter' => 'startJs:function(){return this.value + " (Footbal Player)"}:endJs',
                    // use 'startJs:yourjavasscripthere:endJs'
                ],
            ])
            ->yaxis([
                'text' => 'This Y Axis',
            ])
            ->legend([
                'layout'        => 'vertikal',
                'align'         => 'right',
                'verticalAlign' => 'middle',
            ])
            ->series(
                [
                    [
                        'name'  => 'vitesse moy',
                        'data'  => $tabvitMoy,
                        'color' => '#0c2959',
                    ],
                    [
                        'name'  => 'vitesse min',
                        'data'  => $tabvitMin,
                        'color' => '#f02959',
                    ],
                    [
                        'name'  => 'vitesse max',
                        'data'  => $tabvitMax,
                        'color' => '#f029ff',
                    ],

                ]
            )
            ->display();

        return view('pages/relevesrucherGraphiques', ['graphiquesVitesses' => $graphiquesVitesses,]);
    }

    // Calculette pour callback webservice SigfoxMessage
    public function calculetteCallback(){
        return view('pages/calculetteCallback');
    }
}
