<?php
	
if($_REQUEST['api']=='geonames'){
	$executionStartTime = microtime(true) / 1000;

	$url='http://api.geonames.org/countryInfoJSON?formatted=true&lang=' . $_REQUEST['lang'] . '&country=' . $_REQUEST['country'] . '&username=Poliana&style=full';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);

	$result=curl_exec($ch);

	curl_close($ch);

	$decode = json_decode($result,true);	

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "mission saved";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['continent'] = $decode['geonames'][0]['continent'];
	$output['capital'] = $decode['geonames'][0]['capital'];
	$output['languages'] = $decode['geonames'][0]['languages'];
	$output['population'] = $decode['geonames'][0]['population'];
	$output['area'] = $decode['geonames'][0]['areaInSqKm'];
	$output['name'] = '-';
	$output['lng'] = '-';
	$output['lat'] = '-';
	$output['city'] = '-';
	$output['timezone'] ='-';
	



}elseif($_REQUEST['api']=='geolocation'){
	$executionStartTime = microtime(true) / 1000;

	$url='https://api.addressy.com/Geocoding/International/Geocode/v1.10/json.ws?Key=FJ27-UE87-RK53-TC14&Country=' . $_REQUEST['country'] .'&Location=' . $_REQUEST['location'];



	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);

	$result=curl_exec($ch);

	curl_close($ch);

	$decode = json_decode($result,true);	

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "mission saved";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['continent'] = '-';
	$output['capital'] = '-';
	$output['languages'] = '-';
	$output['population'] = '-';
	$output['area'] = '-';
	$output['name'] = $decode[0]['Name'];
	$output['lng'] = $decode[0]['Longitude'];
	$output['lat'] = $decode[0]['Latitude'];
	$output['city'] = '-';
	$output['timezone'] ='-';
	


}elseif($_REQUEST['api']=='neutrino'){
	$executionStartTime = microtime(true) / 1000;

	$url='https://neutrinoapi.net/geocode-address' ; 



	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"address=" . $_REQUEST['location'] .", " . $_REQUEST['country'] . '&api-key=Yp1uTk5qCxMwtUKHsGQ7F7kKJOxvHX5793mB5hPU64JTZCxH&user-id=poliana1');
	
	$result=curl_exec($ch);


	curl_close($ch);


	$decode = json_decode($result,true);	

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "mission saved";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['continent'] = '-';
	$output['capital'] = '-';
	$output['languages'] = '-';
	$output['population'] = '-';
	$output['area'] = $decode;
	$output['name'] = $decode['locations'][0]['timezone']['id'];
	$output['lng'] = $decode['locations'][0]['longitude'];
	$output['lat'] = $decode['locations'][0]['latitude'];
	$output['city'] = $decode['locations'][0]['city'];
	$output['timezone'] = $decode['locations'][0]['timezone']['name'];



}
	
	
	/*header('Content-Type: application/json; charset=UTF-8');*/

	echo json_encode($output);

?>
