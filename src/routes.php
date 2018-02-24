<?php

use Notifications\Models\Subscription;
use Slim\Http\Request;
use Slim\Http\Response;
use Minishlink\WebPush\WebPush;
use WebDrinkAPI\Utils\Database;

$app->post('/add', function (Request $request, Response $response) {
    $parsedBody = $request->getParsedBody();

    $entityManager = Database::getEntityManager();

    // Create new Subscription
    $subscription = new Subscription(
        $parsedBody['site'],
        $parsedBody['endpoint'],
        $parsedBody['userPublicKey'],
        $parsedBody['userAuthToken']
    );

    // Add to database
    $entityManager->persist($subscription);
    $entityManager->flush($subscription);

    return $response->withJson($subscription);
});


$app->post('/send', function (Request $request, Response $response) {

    $entityManager = Database::getEntityManager();

    // Get Subscriptions from DB
    $subscriptionsTable = $entityManager->getRepository("subscriptions");
    $subscriptions = $subscriptionsTable->findBy(['site' => 'blog']);

    $webPush = new WebPush();

    // Loop through subscriptions and make notification for each
    foreach ($subscriptions as $subscription) {
        $webPush->sendNotification(
            $subscription->getEndpoint(),
            "Payload HERE!",
            $subscription->getUserPublicKey(),
            $subscription->getUserAuthToken()
        );
    }
    $webPush->flush();

    return $response->withJson();
});
