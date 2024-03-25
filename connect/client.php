<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Socket Client Form</title>
</head>

<body>
  <h2>Socket Client Form</h2>
  <form id="socketForm">
    <label for="hostname">Hostname:</label>
    <input type="text" id="hostname" name="hostname" placeholder="Enter hostname">
    <br>
    <label for="port">Port:</label>
    <input type="text" id="port" name="port" placeholder="Enter port">
    <br>
    <button type="submit">Connect</button>
  </form>

  <div id="response"></div>

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