<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
        public function index($id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.deezer.com/album/".$id."",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_COOKIE => "dzr_uniq_id=dzr_uniq_id_fr9fb9a1bbcd6766d92a949f51ecad94e9c5297b",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        //dd(json_decode($response));
        echo $response;
        }

    return view("contact");                             //retourne la vue contact
}

    /*public function send(Request $resquest){                    //variable globale request 
        $name = $resquest->input('nom');
        $email = $resquest->input('email');
       // dd($name.' - '.$email);                            //le dd est global au formaulaire quelque soit le nombre de champ debug de la variable
        return view('response', ['nom' => $name]);       //on renvoi la variable $name dans la vue

    }*/
}
