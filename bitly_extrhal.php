<?php

# https://dev.bitly.com/v4_documentation.html - be aware of rate limits!

/*
  simple php script to use the bit.ly api (v4) to generate
  a short link for the provided url in parameter $_GET['url']

  sample use: http://serveraddress/bitly_link_shortener.php?url=link_to_shorten
  
  make sure link_to_shorten is url encoded first

  !!! script will not work correctly without an auth token !!!
*/

function bitly_v4_shorten($url) {
	/*
	if (!empty($_GET['url'])) {
		$long_url = $_GET['url'];
	} 
	else {
		exit('Must provide url parameter with a link to shorten.<br><br> ?url=link_to_shorten');  
	}
	*/
	$long_url = $url;

	# you'll need an auth token from bit.ly, make an account first
	$auth_token = 'your_auth_token';

	# setup basic curl options
	$ch = curl_init();
	curl_setopt_array($ch, [
		CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT        => 30,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_SSL_VERIFYPEER => 0
	]);

	# get group id (guid) for your bit.ly account, required later for POST request
	# you could probably store this and/or hard code it once known.
	$http_header = [
		"Host: api-ssl.bitly.com",
		"Authorization: Bearer ".$auth_token,
		"Accept: application/json",
	];
	curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
	curl_setopt($ch, CURLOPT_URL, 'https://api-ssl.bitly.com/v4/groups');
	$groups_response = curl_exec($ch);
	$group_guid = json_decode($groups_response, true)['groups'][0]['guid'];

	# setup and send post request - tells bit.ly what link we want shortened
	$postfields = [
		'group_guid' => $group_guid,
		'domain'     => "bit.ly",
		'long_url'   => $long_url,
	];
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postfields));
	curl_setopt($ch, CURLOPT_URL, 'https://api-ssl.bitly.com/v4/shorten');
	$http_header[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
	$post_response = curl_exec($ch);

	# get the shortened url from bit.ly's POST response
	$shortened_url = json_decode($post_response, true)['link'];

	# write shortened url to output
	//$fp_out = fopen('php://output', 'w');
	//fwrite($fp_out, $shortened_url);
	//fclose($fp_out);
	curl_close($ch);
	return $shortened_url;
}
