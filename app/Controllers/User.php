<?php

namespace App\Controllers;
use App\Helpers\API;
use CURLFile;
use Faker\Extension\Helper;

class User extends BaseController
{
  
  public function profile(): string
  {
    $session = session();
    $token = $token = $session->get('user');
    
    // get user
    $user = API::fetchApi('GET', '/profile', [], $token);
    $user = $user['data'];
    
    return view('profile', ['session' => $session, 'user' => $user]);
  }
  
  public function editProfile(): string
  {
    $session = session();
    $token = $session->get('user');

    // profile
    $user = API::fetchApi('GET', '/profile', [], $token);
    $user = $user['data'];
    
    return view('editprofile', ['user' => $user]);
  }

  public function editProfileAction()
  {
    $session = session();
    $token = $session->get('user');

    $data = [
      'first_name' => $this->request->getVar('first_name'),
      'last_name' => $this->request->getVar('last_name'),
    ];

    $response = API::fetchApi('PUT', '/profile/update', $data, $token);
    
    if ($response['status'] == 0){
      $session->setFlashdata('success', $response['message']);
      return redirect()->to('/profile');
    } else if ($response['status'] == 108) {
      $session->setFlashdata('error', $response['message']);
      $session->destroy();
      
      return redirect()->route('login');
    } else {
      $session->setFlashdata('error', $response['message']);
      return redirect()->to('/editprofile');
    };
  }

  public function editImage()
  {
    $session = session();
    $token = $session->get('user');

    // get user
    $user = API::fetchApi('GET', '/profile', [], $token);
    $user = $user['data'];
    
    return view('profileimage', ['user' => $user]);
  }

  public function updateImage()
  {
    $session = session();
    $token = $session->get('user');

    $file = $this->request->getFile('profile_image');
    
    if ($file->getPathname() == '' && $file->getClientMimeType() == '' && $file->getName() == '') {
      $temp = '';
    } else {
      $temp = new \CURLFile($file->getPathname(), $file->getClientMimeType(), $file->getName());
    }
    
    $data = [
      'file' => $temp,
    ];

    // validation
    $validation = \Config\Services::validation();
      
    $rules = [
      "profile_image" => [
        "label" => "Profile Image",
        "rules" => "max_size[profile_image,100]|ext_in[profile_image,jpg,png]",
        "errors" => [
          "max_size" => "Ukuran gambar tidak boleh lebih dari 100kb",
          "ext_in" => "File ekstensi harus jpg atau png"
        ]
      ],
    ];
      
    $validation->setRules($rules);
      
    if ($validation->withRequest($this->request)->run()) {
      // send
      $client = \Config\Services::curlrequest();

      $url = 'https://take-home-test-api.nutech-integrasi.app/profile/image';
      $headers = [
        'Content-Type' => 'multipart/form-data',
        'Authorization' => 'Bearer ' . $token
        ];
    
      $response = $client->request('PUT', $url, ['headers' => $headers, 'multipart' => $data, 'http_errors' => false]);
      $response = json_decode($response->getBody(), true);
      
      if ($response['status'] == 0){
        $session->setFlashdata('success', $response['message']);
        return redirect()->to('/profile');

      } else if ($response['status'] == 108) {
        $session->setFlashdata('error', $response['message']);
        $session->destroy();
        
        return redirect()->route('login');
      } else {
        $session->setFlashdata('error', $response['message']);
        return redirect()->to('/profile');
      }
    } else {
      $error = $validation->getErrors();
      echo $error['profile_image'];
    }

  }
  
}