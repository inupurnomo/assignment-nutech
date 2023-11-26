<?php

namespace App\Controllers;
use App\Helpers\API;

class Home extends BaseController
{

  public function dashboard()
  {
    $session = session();
    $token = $session->get('user');

    if (!$session->get('user')){
      $session->setFlashdata('error', 'Login terlebih dahulu!');
      return redirect()->route('login');
    }

    // get user
    $user = API::fetchApi('GET', '/profile', [], $token);
    $user = $user['data'];
    
    // get balance
    $balance =  API::fetchApi('GET', '/balance', [], $token);
    $balance = $balance['data'];
    
    // get services
    $services = API::fetchApi('GET', '/services', [], $token);
    $services = $services['data'];
    
    // get banner
    $banner = API::fetchApi('GET', '/banner', [], $token);
    $banner = $banner['data'];

    return view('dashboard', ['session' => $session, 'user' => $user, 'balance' => $balance, 'services' => $services, 'banner' => $banner]);
  }
  
  public function topup()
  {
    $session = session();
    $token = $session->get('user');

    if (!$session->get('user')){
      $session->setFlashdata('error', 'Login terlebih dahulu!');
      return redirect()->route('login');
    }
    
    // get user
    $user = API::fetchApi('GET', '/profile', [], $token);
    $user = $user['data'];

    // get balance
    $balance = API::fetchApi('GET', '/balance', [], $token);
    $balance = $balance['data'];
    
    return view('topup', ['session' => $session, 'user' => $user, 'balance' => $balance]);
  }

  public function topupAction()
  {
    $session = session();
    $token = $session->get('user');
    
    if ($this->request->getMethod() == 'post') {
      $validation = \Config\Services::validation();
      
      $rules = [
        "top_up_amount" => [
          "label" => "Amount",
          "rules" => "required|min_length[5]",
          "errors" => [
            'required' => 'Amount harus diisi',
            'min_length' => 'Minimal Top Up Rp 10.000'
          ]
        ]
      ];
        
      $validation->setRules($rules);
      if ($validation->withRequest($this->request)->run()) {
        $data = [
          'top_up_amount' => $this->request->getVar('top_up_amount')
        ];
  
        // send
        $response = API::fetchApi('POST', '/topup', $data, $token);
  
        if ($response['status'] == 0){
          $session->setFlashdata('success', $response['message']);
          return redirect()->route('topup');
        } else if ($response['status'] == 108) {
          $session->setFlashdata('error', $response['message']);
          $session->destroy();
          
          return redirect()->route('login');
        } else{
          $session->setFlashdata('error', $response['message']);
        
          return redirect()->route('topup');
        }
      } else {
        $error = $validation->getErrors();
        $session->setFlashdata('error', $error['top_up_amount']);
        
        return redirect()->back();
      }
    }
  }

  public function service($s)
  {
    $session = session();
    $token = $session->get('user');
    
    if (!$session->get('user')){
      $session->setFlashdata('error', 'Login terlebih dahulu!');
      return redirect()->route('login');
    }
    
    // get user
    $user = API::fetchApi('GET', '/profile', [], $token);
    $user = $user['data'];

    // get balance
    $balance = API::fetchApi('GET', '/balance', [], $token);
    $balance = $balance['data'];

    // get services
    $services = API::fetchApi('GET', '/services', [], $token);
    $services = $services['data'];

    // search service
    $number = null;
    for ($a = 0; $a < sizeof($services); $a++) {
      if ($services[$a]['service_code'] == $s) {
        $number = $a;
        break;
      }
    }

    $service = $services[$number];
    
    return view('service', ['session' => $session, 'user' => $user, 'balance' => $balance, 'service' => $service]);
  }

  public function serviceAction()
  {
    $session = session();
    $token = $session->get('user');
    
    $data = [
      'service_code' => $this->request->getVar('service_code'),
    ];
    
    // send
    $response = API::fetchApi('POST', '/transaction', $data, $token);

    if ($response['status'] == 0){
      $session->setFlashdata('success', $response['message']);
      return redirect()->to('/');
    } else if ($response['status'] == 108) {
      $session->setFlashdata('error', $response['message']);
      $session->destroy();
      
      return redirect()->route('login');
    } else{
      $session->setFlashdata('error', $response['message']);
      
      return redirect()->back();
    }
  }

  public function history()
  {
    $session = session();
    $token = $session->get('user');

    if (!$session->get('user')){
      $session->setFlashdata('error', 'Login terlebih dahulu!');
      return redirect()->route('login');
    }

    // get user
    $user = API::fetchApi('GET', '/profile', [], $token);
    $user = $user['data'];

    // get balance
    $balance = API::fetchApi('GET', '/balance', [], $token);
    $balance = $balance['data'];
    
    // get history
    $history = API::fetchApi('GET', '/transaction/history?offset=0&limit=5', [], $token);
    $history = $history['data']['records'];

    return view('history', ['token' => $token, 'user' => $user, 'balance' => $balance, 'history' => $history]);
  }

}