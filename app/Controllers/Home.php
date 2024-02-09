<?php

namespace App\Controllers;

use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Model\DevCycleUser;

class Home extends BaseController
{
    public function index(): string
    {

        // Create a new DevCycleOptions object, enabling debug mode or additional logging if true is passed.
        $options = new DevCycleOptions(true);


        // Initialize the DevCycle client with the server SDK key obtained from environment variables and the previously defined options.
        // This client will interact with the DevCycle API for feature flag evaluations.
        $devcycle_client = new DevCycleClient(
            sdkKey: $_ENV["DEVCYCLE_SERVER_SDK_KEY"],
            dvcOptions: $options
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
