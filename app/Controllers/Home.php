<?php

namespace App\Controllers;

use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Model\DevCycleUser;
use GuzzleHttp\Client;

class Home extends BaseController
{
    public function index(): string
    {


        // Configure API key authorization: bearerAuth
        $config = DevCycleConfiguration::getDefaultConfiguration()->setApiKey(
            "Authorization",
            $_ENV["DEVCYCLE_SERVER_SDK_KEY"]
        );

        $devcycle_client = new DevCycleClient(
            $config,
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new Client(),
        );

        $user_data = new DevCycleUser(array(
            "user_id" => "my-user"
        ));


        return view('index', [
            'devcycle_client' => $devcycle_client,
            'user_data' => $user_data
        ]);
    }
}
