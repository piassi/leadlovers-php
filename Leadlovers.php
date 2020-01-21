<?php

require_once 'src/Unirest.php';

Class Leadlovers {
	private $api_key = '';
	public $token = '';
	private $base_url = 'http://llapi.leadlovers.com/webapi/';
	private $headers = array();

	public function __construct($api_key, $token = '') {
    $this->set_api_key($api_key);

    if (!empty($token)) {
      $this->set_token($token);
    }

    $this->headers = array('Authorization' => 'Bearer '.$this->api_key);
  }

  public function get_token() {
    return $this->token;
  }

  public function set_token($token) {
    return $this->token = $token;
  }

  public function set_api_key($api_key) {
    return $this->api_key = $api_key;
  }

  public function request_url($action) {
    return $this->base_url.$action.'?token='.$this->get_token();
  }

  public function set_token_auth($userlogin, $userpass) {
    $data = array('userlogin' => $userlogin, 'userpass' => $userpass);
    $response = Unirest\Request::post($this->request_url('token'), $this->headers, $data);
    return $this->set_token($response->body->CodigoToken);
  }

  public function get($action, $data) {
    $response = Unirest\Request::get($this->request_url($get), $this->headers, $data);
    return $response->body;
  }

  public function patch($action, $data) {
    $this->headers['Content-Type'] = 'application/json';
    $body = Unirest\Request\Body::json($data);
    $response = Unirest\Request::patch($this->request_url($action), $this->headers, $body);
    return $response->body;
  }

  public function post($action, $data) {
    $this->headers['Content-Type'] = 'application/json';
    $body = Unirest\Request\Body::json($data);
    $response = Unirest\Request::post($this->request_url($action), $this->headers, $body);
    return $response->body;
  }
}