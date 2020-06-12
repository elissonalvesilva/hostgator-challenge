<?php

namespace Tests;

use DI\ContainerBuilder;
use Exception;
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;
use Slim\Psr7\Request as SlimRequest;
use Slim\Psr7\Uri;

class TestBase extends PHPUnit_TestCase
{
    /**
     * @param string $method
     * @param string $path
     * @param array  $headers
     * @param array  $cookies
     * @param array  $serverParams
     * @return object response
     */
    protected function makeRequest(
        string $method,
        string $path,
        array $headers = ['HTTP_ACCEPT' => 'application/json'],
        array $cookies = [],
        array $serverParams = []
    ) {
        $response = $this->callApi($method, $path, $headers);
        return $response;
    }

    /**
     * Call API method to request a health check from tests
     * @param String $method - Method type GET, PUT, POST, DELETE
     * @param String $path - Path to request
     * @param Array $headers - Headers params as default 'HTTP_ACCEPT' => 'application/json'
     * @param $data - With want to call a external API using post 
     * you must to pass a data to record
     * @return $data
     */
    private function callApi(
        string $method,
        string $path,
        array $headers,
        $data = null
    ) {
        $url = 'http://localhost:3000'.$path;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_HEADER, $method);
        $response = curl_exec($curl);
        $data = json_decode($response);
        /* Check for 404 (file not found). */
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // Check the HTTP Status code
        switch ($httpCode) {
            case 200:
                $error_status = "200: Success";
                return ($data);
                break;
            case 404:
                $error_status = "404: API Not found";
                return ($data);
                break;
            case 500:
                $error_status = "500: servers replied with an error.";
                return ($data);
                break;
            case 502:
                $error_status = "502: servers may be down or being upgraded. Hopefully they'll be OK soon!";
                return ($data);
                break;
            case 503:
                $error_status = "503: service unavailable. Hopefully they'll be OK soon!";
                return ($data);
                break;
            default:
                $error_status = "Undocumented error: " . $httpCode . " : " . curl_error($curl);
                break;
        }
        curl_close($curl);
        echo $error_status;
        die;
    }
}