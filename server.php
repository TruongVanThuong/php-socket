<?php
// error_reporting(E_ALL);

/* Cho phép tập lệnh chờ kết nối. */
set_time_limit(0);

/* Bật tính năng xóa đầu ra ngầm định để chúng tôi biết những gì chúng tôi nhận được khi nó xuất hiện. */
ob_implicit_flush();

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n");

$address = 'localhost'; // Địa chỉ IP của máy chủ
$port = 41712; // Cổng mà máy chủ đang lắng nghe

if (!socket_bind($socket, $address, $port)) {
    $error = socket_last_error($socket);
    if ($error === 0) {
        echo "Binding successful, no error.\n";
    } else {
        echo "Error binding socket: " . socket_strerror($error) . "\n";
    }
    die();
}

echo "Socket bound successfully to $address:$port\n";

socket_listen($socket, 3) or die("Could not set up socket listener\n");
echo "Socket bound successfully to $address:$port\n";

// Chấp nhận kết nối mới
$clientSocket = socket_accept($socket) or die("Could not accept incoming connection: " . socket_strerror(socket_last_error()) . "\n");
echo "Accepted incoming connection.\n";

// Đọc dữ liệu gửi từ client
$input = socket_read($clientSocket, 2048) or die("Could not read input\n");

// Xử lý dữ liệu
$url = $_POST["url"];

// Gửi phản hồi lại cho client
$response = socket_write($clientSocket, $url, strlen($url)) or die("Could not write output\n");

echo $response;
// Đóng kết nối với client
socket_close($clientSocket);

// Đóng socket lắng nghe
socket_close($socket);