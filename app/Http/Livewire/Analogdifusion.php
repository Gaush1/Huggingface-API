<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;

class Analogdifusion extends Component
{
    public $inputData;
    public $resultAnalog;

    public function makeQuery()
    {
        $data = ["inputs" => $this->inputData]; 
        $apiUrlAnalog = "https://api-inference.huggingface.co/models/wavymulder/Analog-Diffusion";
        $apiTokenAnalog = "";

        $headersAnalog = [
            'Authorization' => 'Bearer ' . $apiTokenAnalog,
            'Content-Type' => 'application/json',
        ];

        $client = new Client();
        $responseAnalog = $client->postAsync($apiUrlAnalog, [
            'headers' => $headersAnalog,
            'json' => $data,
        ])->then(function ($response) {
            return $response->getBody()->getContents();
        })->wait();

        $this->resultAnalog = $responseAnalog;
    }

    public function render()
    {
        return view('livewire.analogdifusion');
    }
}
