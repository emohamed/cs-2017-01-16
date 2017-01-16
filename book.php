<?php
sleep(1);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nights      = $_POST['nights'];
	$price       = $_POST['price'];
	$destination = $_POST['destination'];
	$num_children = $_POST['num_children'];

	$response    = array(
		'nights'       => $nights,
		'price'        => (int) $price * (int) $nights,
		'destination'  => $destination,
		'confirmation' => md5(time()),
	);
	header('Content-Type: application/json; charset=utf-8');
	echo json_encode($response);
} else {
	echo 'Method not allowed.';
}
