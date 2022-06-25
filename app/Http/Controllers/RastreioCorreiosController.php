<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RastreioCorreiosController extends Controller
{
    const URL_BASE = 'https://proxyapp.correios.com.br/';

    public function index()
    {
        return view('rastreio.index');
    }
    
    public function consultaRastreio (Request $request)
    {
        //incia o curl
        $curl = curl_init();

        //configura a requisição do CURL
        curl_setopt_array($curl, [
            CURLOPT_URL => self::URL_BASE.'v1/sro-rastro/'.strtoupper($request->codigo),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET'
        ]);

        //reponse
        $response = curl_exec($curl);

        //fecha a conexão
        curl_close($curl);

        $results = json_decode($response, true);
        $url_base = self::URL_BASE;

        return view('rastreio.index', compact('results', 'url_base'));
    }
}
