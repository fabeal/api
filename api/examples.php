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
	'price'         => '2500000',
	'title'         => 'New house',
	'description'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.',
	'area'          => 50,
	'rooms'         => 3,
	'offer_type'    => 'sale',//or 'rent'
	'built'         => '1998',
	'city'          => 'Świnoujście',
	'street'        => 'Józefa Piłsudskiego',
	'floor'         => 5,
	'windows'       => '4 wood and 1 plastic',
	'garage'        => 1,
	'basement'      => 1,
	'parking_place' => 1,
	'secure_parking'=> 1,
	'photos'        => array(
						'photo_1' => 'http://domain.com/image1.jpg',
						'photo_2' => 'http://domain.com/image1.bmp'
					),
	'underground_parking' => 1,

));

//get data 1 property
$result = $client->get_property(1);
print_r($result);


$result = $client->update_Property(1, array(
	'price'         => '2500001',
));
print_r($result);


//delete 1 property
$result = $client->delete_property(1);
print_r($result);
