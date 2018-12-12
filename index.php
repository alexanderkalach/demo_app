<?php
    require 'vendor/autoload.php';
    
    if (isset($_GET['overlay'])) {
        $overlay = $_GET['overlay'];
        // todo
        $homeId = 169731;
        $zoneId = 1;
        if ($overlay === 'boost') {
            $action = new Demo\Api\Action\CreateOverlayBoost($homeId, $zoneId, 25);
        } elseif ($overlay === 'cooldown') {
            $action = new Demo\Api\Action\CreateOverlayCooldown($homeId, $zoneId, 30);
        } else {
            // todo
        }
        if (isset($action)) {
            // todo
            $jwtToken = $_ENV['JWT_TOKEN'];
            $apiUrl = $_ENV['API_URL'];
            $client = new Demo\Api\Client($apiUrl, $jwtToken);
            $client->executeAction($action);
            header('Location: /');
            exit();
        }
    }
?>
<a href="/?overlay=boost">Boost</a><br/><br/>
<a href="/?overlay=cooldown">Cooldown</a>