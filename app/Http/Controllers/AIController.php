<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

class AIController extends Controller
{
    public function tanya(Request $request)
    {
        $pertanyaan = $request->input('pertanyaan');

        try {
            $client = new Client();

            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'), // Ganti dengan API key OpenAI Anda
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo', // Ganti dengan model yang Anda inginkan
                    'messages' => [
                        ['role' => 'user', 'content' => $pertanyaan]
                    ],
                    'max_tokens' => 50,
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            // Responsenya biasanya array text hasil prediksi
            $jawaban = $data['choices'][0]['message']['content'] ?? 'Tidak ada jawaban.';

            return response()->json(['jawaban' => $jawaban]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}
