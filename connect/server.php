<?php
// Tạo kết nối socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$hostname = $_POST["hostname"];
$port = $_POST["port"];
if ($socket === false) {
  echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
  // Kết nối tới máy chủ
  $result = socket_connect($socket, $hostname, $port);

  if ($result === false) {
    echo "socket_connect() failed: " . socket_strerror(socket_last_error($socket)) . "\n";
  } else {
    // Gửi dữ liệu tới máy chủ
    $message = "Hello, server!";
    socket_write($socket, $hostname, strlen($hostname));

    // Đọc phản hồi từ máy chủ
    $response = socket_read($socket, 2048);

    // Hiển thị phản hồi từ máy chủ
    echo $response;

    // Đóng kết nối socket
    socket_close($socket);
  }
}