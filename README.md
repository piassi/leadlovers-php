# Leadlovers PHP API

Classe para integração da plataforma Leadlovers com aplicações escritas em PHP.

## Incialização

```php
require('Leadlovers.php');

// Utilizando api key e token
$api_key = 'SUA_API_KEY';
$token = 'SEU_TOKEN';
$leadlovers = new Leadlovers($api_key, $token);

// Utilizando somente api key
$user_login = 'SEU_LOGIN';
$user_pass = 'SUA_SENHA';

$leadlovers = new Leadlovers($api_key);
$leadlovers->set_token_auth($user_login, $user_pass);
```

## Enviar novo lead
```php
$machine_code = 12345; // Código da máquina
$email_sequence_code = 12345; // Código da sequencia de emails

$lead_data = array(
	'Email' => 'john@doe.com', 
	'Name' => 'John Doe', 
	'MachineCode' => $machine_code, 
	'EmailSequenceCode' => $email_sequence_code, 
	'SequenceLevelCode' => "1"
);

$response = $leadlovers->post('lead', $lead_data);
```

Também estão disponíveis os métodos: GET e PATCH.

Ver documentação: http://apill.azurewebsites.net/