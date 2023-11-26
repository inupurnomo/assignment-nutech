<?php

namespace App\Controllers;
use App\Helpers\API;

class Auth extends BaseController
{

  public function login()
  {
    $session = session();

    if ($session->get('user')) {
      return redirect()->to('/');
    } else {
      return view('login', ['session' => $session]);
    }
  }

  public function loginAction()
  {
    $session = session();

    $data = [
      'email' => $this->request->getVar('email'),
      'password' => $this->request->getVar('password')
    ];

    // send
    $response = API::fetchApi('POST', '/login', $data);

    if ($response['status'] == 0){
      $session->set('user', $response['data']['token']);
      return redirect()->to('/');
    } else if ($response['status'] == 108) {
      $session->setFlashdata('error', $response['message']);
      $session->destroy();
      
      return redirect()->route('login');
    } else {
      $session->setFlashdata('error', $response['message']);
      return redirect()->back();
    };
  }
  
  public function register()
  {
    $session = session();

    if ($session->get('user')) {
      return redirect()->to('/');
    } else {
      return view('register', ['session' => $session]);
    };
  }
  
  public function registerAction()
  {
    $session = session();

    if ($this->request->getMethod() == 'post') {
      $validation = \Config\Services::validation();
      
      $rules = [
        "password2" => [
          "label" => "Password Confirmation",
          "rules" => "matches[password]",
        ],
      ];
        
      $validation->setRules($rules);
        
      if ($validation->withRequest($this->request)->run()) {
        $data = [
          'email' => $this->request->getVar('email'),
          'first_name' => $this->request->getVar('first_name'),
          'last_name' => $this->request->getVar('last_name'),
          'password' => $this->request->getVar('password')
        ];
      
        // send
        $response = API::fetchApi('POST', '/registration', $data);

        if ($response['status'] == 0){
          $session->setFlashdata('success', $response['message']);
          return redirect()->to('/login');
        } else if ($response['status'] == 108) {
          $session->setFlashdata('error', $response['message']);
          $session->destroy();
          
          return redirect()->route('login');
        } else {
          $session->setFlashdata('error', $response['message']);
          return redirect()->back()->withInput();
        };
      } else {
        $error = $validation->getErrors();
        $session->setFlashdata('error', $error['password2']);

        return redirect()->back()->withInput();
      }
    }
  }

  public function logout()
  {
    session()->destroy();
    return redirect('login');
  }
}