<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Models\Guru;
use App\Models\Galeri;
use App\Models\Prestasi; 


class WelcomeController extends Controller
{
    public function index()
    {
        $dataGuru = Guru::all();
        $galeris = Galeri::latest()->take(6)->get();
        $prestasis = Prestasi::latest()->take(3)->get(); 

        return view('welcome', compact('dataGuru', 'galeris',));
    }
    
public function tanya(Request $request)
{
    $pertanyaan = $request->input('pertanyaan');

    try {
        $client = new Client();
        $res = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type'  => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'Kamu adalah asisten AI yang ahli dalam perkembangan dan pendidikan anak. Jawablah dengan bahasa Indonesia yang jelas dan mudah dipahami.'],
                    ['role' => 'user', 'content' => $pertanyaan]
                ],
                'max_tokens' => 500
            ]
        ]);

        $data = json_decode($res->getBody(), true);
        $jawaban = $data['choices'][0]['message']['content'] ?? 'Tidak ada jawaban.';

        return response()->json(['jawaban' => $jawaban]);
    } catch (RequestException $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'body' => $e->hasResponse() ? (string) $e->getResponse()->getBody() : null
        ], 500);
    }
}

}

