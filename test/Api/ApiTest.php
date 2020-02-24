<?php

namespace EFLOW\Client;

use \EFLOW\Client\Configuration;
use \EFLOW\Client\ApiException;
use \EFLOW\Client\ObjectSerializer;

class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $password = getenv('KEY_PASSWORD');
        $this->signer = new \EFLOW\Client\Interceptor\KeyHandler(null, null, $password);     

        $events = new \EFLOW\Client\Interceptor\MiddlewareEvents($this->signer);
        $handler = \GuzzleHttp\HandlerStack::create();
        $handler->push($events->add_signature_header('x-signature'));
        $handler->push($events->verify_signature_header('x-signature'));

        $client = new \GuzzleHttp\Client(['handler' => $handler, 'verify' => false]);
        $config = new \EFLOW\Client\Configuration();
        $config->setHost('the_url');
        
        $this->apiInstance = new \EFLOW\Client\Api\EFLOWApi($client,$config);
    }       
    
    public function testEflow()
    {
        $x_api_key = "your_api_key";
        $username = "your_username";
        $password = "your_password";

        $request = new \EFLOW\Client\Model\Peticion();

        $request->setFolio("000016");
        $request->setTipoDocumento("1");
        $request->setNumeroDocumento("00000002");

        try {
            $result = $this->apiInstance->eflow($x_api_key, $username, $password, $request);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling ApiTest->eflow: ', $e->getMessage(), PHP_EOL;
        }
    }
}
