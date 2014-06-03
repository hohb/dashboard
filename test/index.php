<?php
//Note: this code is simplified for easy reading and quick understanding
//Read my comments for places where the Google API examples were wrong
function pfa($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';	
}

require_once 'google-api/Google_Client.php';
require_once 'google-api/contrib/Google_CalendarService.php';
session_start();

$client = new Google_Client();
$client->setApplicationName("Google Calendar PHP Event Creator");

// Visit https://code.google.com/apis/console?api=calendar to generate your
// client id, client secret, and to register your redirect uri.
$client->setClientId('1090087808634-m78hjqkbfnri3t16q13gduip0g845bs5.apps.googleusercontent.com');
$client->setClientSecret('UjCEGNvrTVrlinFamnuESbxd');
$client->setRedirectUri('http://127.0.0.1/dashboard/test/');
//$client->setDeveloperKey('AIzaSyDmdFBZoYl9cCh2a_jToRS7gdF4hDPGSyQ');

$cal = new Google_CalendarService($client);
if (isset($_GET['logout'])) {
  echo "<br><br><font size=+2>Logging out</font>";
  unset($_SESSION['token']);
}

if (isset($_GET['code'])) {
  $client->authenticate();
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']); // Strip the authorization code
}
 
if (isset($_SESSION['token'])) {
 // echo "<br>Getting access";
  $client->setAccessToken($_SESSION['token']);
}
/*$events = $cal->events->listEvents('nl.dutch#holiday@group.v.calendar.google.com');
//pfa($events);
while(true) {
  foreach ($events['items'] as $event) {
    echo $event['summary'].' Start : '.$event['start']['date'].' '.$event['end']['date'].'<br />';
  }
  $pageToken = $events['nextSyncToken'];
  if ($pageToken) {
    $optParams = array('pageToken' => $pageToken);
    $events = $cal->events->listEvents('primary', $optParams);
	
  } else {
    break;
  }
}
*/
if ($client->getAccessToken()){

  echo "<hr><font size=+1>I have access to your calendar</font>";
  // $calendars = $cal->calendarList->listCalendarList();
	$calendars = $cal->calendarList->get('jeroen@homeofhappybrands.nl');
 pfa($calendars);
  $event = new Google_Event();
  $event->setSummary('Halloween');
  $event->setLocation('The Neighbourhood');
  $start = new Google_EventDateTime();
  $start->setDateTime('2013-9-29T10:00:00.000-05:00');
  $event->setStart($start);
  $end = new Google_EventDateTime();
  $end->setDateTime('2013-9-29T10:25:00.000-05:00');
  $event->setEnd($end);
  $createdEvent = $cal->events->insert('###', $event);
  echo "<br><font size=+1>Event created</font>";

  echo "<hr><br><font size=+1>Already connected</font> (No need to login)";

} else {

  $authUrl = $client->createAuthUrl();
  print "<hr><br><font size=+2><a href='$authUrl'>Connect Me!</a></font>";

}

$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
echo "<br><br><font size=+2><a href=$url?logout>Logout</a></font>";

?>