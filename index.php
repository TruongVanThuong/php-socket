<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Socket Client</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
  body {
    font-family: Arial, sans-serif;
  }

  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
  }

  button.btn-primary {
    margin: 10px auto;
    display: block;
  }
  </style>
</head>

<body>
  <div class="container">
    <form id="urlForm" method="post">
      <div class="mb-3">
        <label for="urlInput" class="form-label">Nhập URL:</label>
        <input type="text" class="form-control" id="urlInput" name="urlInput" placeholder="https://example.com">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="mb-3">
      <textarea placeholder="kết quả trả về :" id="message" class="form-control" rows="10"></textarea>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
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