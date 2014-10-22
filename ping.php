<?php


define('DRUPAL_ROOT', getcwd());

// Prevent sql injection.
$timestamp = $_GET['timestamp'];
if (!is_numeric($timestamp)) {
  die("1");
}

// Connect to drupal database.
require_once DRUPAL_ROOT . '/sites/default/settings.php';

$creds = $databases['default']['default'];
$constr = sprintf("%s:dbname=%s", $creds['driver'], $creds['database']);
$db = new PDO($constr, $creds['username'], $creds['password']);


// Get count of new items.
$result = $db->query("SELECT count(twitter_id) FROM twitter WHERE created_time > $timestamp");


// HTTP headers to prevent caching the result of this call.
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past (HTTP 1.0)

// JSON response.
print '{"pong":"' . $result->fetchColumn() . '"}';
