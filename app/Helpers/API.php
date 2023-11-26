<?php
namespace App\Helpers;

class API {
  
  static function fetchApi($method, $url, $data = [], $token = null) {
    $client = \Config\Services::curlrequest();
    
    $url = 'https://take-home-test-api.nutech-integrasi.app' . $url;
    $headers = [
      'Content-Type' => 'application/json',
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $token
      ];

    $response = $client->request($method, $url, ['headers' => $headers, 'json' => $data, 'http_errors' => false]);

    return $response = json_decode($response->getBody(), true);
  }
}