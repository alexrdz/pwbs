<?php
// Define directory and file path
$rootDirectory = dirname(dirname(__DIR__));
$pwDirectory = $rootDirectory . '/pw';
$pwFile = $pwDirectory . '/index.php';

if (file_exists($pwFile)) {
  // If index.php exists, require it.
  require ($pwFile);
} else {
  // If it doesn't exist, print a user-friendly error message.
  if (!is_dir($pwDirectory)) {
    echo "Error: ProcessWire directory ('pw') is missing!";
  } else {
    echo "Error: ProcessWire bootstrap file (index.php) is missing in 'pw' directory!";
  }
  exit ();  // stop the execution so users don't see any further PHP related error messages.
}
