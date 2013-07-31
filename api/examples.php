<?php
/**
 * examples of usage fabeal REST api
 *
 * @author Pawel Maslak <pawel.maslak@fabeal.com>
 * @version 1
 */

include 'fabealRESTClient.php';


$client = new fabealRESTClient($api_key);

//check connection
$result = $client->ping();
print_r($result);

//get data 1 property
$result = $client->get_property(1);
print_r($result);

//delete 1 property
$result = $client->delete_property(1);
print_r($result);
