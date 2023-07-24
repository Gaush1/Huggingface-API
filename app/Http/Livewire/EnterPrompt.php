<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;


class EnterPrompt extends Component
{
   
    public $inputText;
    public $resultImage;

    // public function render()
    // {
    //     return view('livewire.enter-prompt');
    // }

    public function makeQuery()
    {
        $data = ["inputs" => $this->inputText]; // Use the user input
        $apiUrl = "https://api-inference.huggingface.co/models/johnslegers/epic-diffusion";
        $apiToken = "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";

        $headers = [
            'Authorization' => 'Bearer ' . $apiToken,
            'Content-Type' => 'application/json',
        ];

        $client = new Client();
        $response = $client->postAsync($apiUrl, [
            'headers' => $headers,
            'json' => $data,
        ])->then(function ($response) {
            return $response->getBody()->getContents();
        })->wait();

        $this->resultImage = $response;
    }

    public function render()
    {
        return view('livewire.enter-prompt');
    }
}

