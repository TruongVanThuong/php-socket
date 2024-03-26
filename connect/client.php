<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Socket Client Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
  body {
    font-family: Arial, sans-serif;
    padding: 20px;
  }
  </style>
</head>

<body>
  <div class="container">
    <h2 class="text-center mb-4">Socket Client Form</h2>
    <form id="socketForm" class="row g-3">
      <div class="col-md-6">
        <label for="hostname" class="form-label">Hostname:</label>
        <input type="text" class="form-control" id="hostname" name="hostname" placeholder="Enter hostname">
      </div>
      <div class="col-md-6">
        <label for="port" class="form-label">Port:</label>
        <input type="text" class="form-control" id="port" name="port" placeholder="Enter port">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Connect</button>
      </div>
    </form>
    <div id="response" class="mt-4"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script>
  document.getElementById('socketForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var hostname = document.getElementById('hostname').value;
    var port = document.getElementById('port').value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'server.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById('response').innerText = xhr.responseText;
      } else {
        document.getElementById('response').innerText = 'Error: ' + xhr.status;
      }
    };

    xhr.send('hostname=' + encodeURIComponent(hostname) + '&port=' + encodeURIComponent(port));
  });
  </script>
</body>

</html>