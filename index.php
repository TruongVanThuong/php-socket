<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Socket Client</title>
  <style>
  .container {
    width: 500px;
    margin: 0 auto;
  }

  form {
    margin: 50px 0;
    text-align: center;
  }

  label {
    display: block;
    margin-bottom: 10px;
  }

  input[type="text"] {
    width: 100%;
    padding: 10px 0;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  button:hover {
    background-color: #45a049;
  }

  #message {
    width: 100%;
  }
  </style>
</head>

<body>
  <div class="container">
    <form id="urlForm" method="post">
      <label for="urlInput">Nhap URL:</label>
      <input type="text" id="urlInput" name="urlInput" placeholder="https://example.com">
      <button type="submit">Submit</button>
    </form>
    <textarea id="message" cols="50" rows="10" width="100"></textarea>
  </div>

  <script>
  document.getElementById('urlForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var url = document.getElementById('urlInput').value;
    sendData(url);
  });

  function sendData(url) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/php-socket/server.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById('message').value = xhr.responseText;
      } else {
        console.error('Request failed. Status: ' + xhr.status);
      }
    };
    xhr.send('url=' + encodeURIComponent(url));
  }
  </script>
</body>

</html>