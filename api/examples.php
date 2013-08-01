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

$client->add_property(array(
	'price' => '2500000',
	'title' => 'New house',
	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.',
	'area' => 50,
	'city' => 'Świnoujście',
	'garage' => 1,

));

//get data 1 property
$result = $client->get_property(1);
print_r($result);

//delete 1 property
$result = $client->delete_property(1);
print_r($result);
