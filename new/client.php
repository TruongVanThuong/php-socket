<?php
error_reporting(E_ALL);

/* Get the port for the WWW service. */
$service_port = getservbyname('www', 'tcp');

/* Get the IP address for the target host. */
$address = gethostbyname('www.example.com'); // Change this to your server's hostname or IP address

/* Create a TCP/IP socket. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
  echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
  echo "OK.\n";
}

echo "Đang cố gắng kết nối với '$address' trên cổng '$service_port'...";
$result = socket_connect($socket, $address, $service_port);

if ($result === false) {
  echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
  echo "OK.\n";
}

$in = "HEAD / HTTP/1.1\r\n";