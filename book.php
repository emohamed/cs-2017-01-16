<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nights      = $_POST['nights'];
	$price       = $_POST['price'];
	$destination = $_POST['destination'];
	$response    = [
		'nights'       => $nights,
		'price'        => (int) $price * (int) $nights,
		'destination'  => $destination,
		'confirmation' => md5(time()),
	];

	echo json_encode($response);
} else {
	echo 'Method not allowed.';
}
