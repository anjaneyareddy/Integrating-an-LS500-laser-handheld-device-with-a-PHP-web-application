<?php

include 'PhpSerial.php';

$serial = new phpSerial;
$serial->deviceSet("/dev/ttyUSB0");
$serial->confBaudRate(9600);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");

$serial->deviceOpen();

// Send command to device
$serial->sendMessage("COMMAND");

// Read response from device
$read = $serial->readPort();

// Close serial port
$serial->deviceClose();

// Process data
$data = json_decode($read, true);

// Display data on web application
echo "<p>Data from LS500: {$data['value']}</p>";

?>

