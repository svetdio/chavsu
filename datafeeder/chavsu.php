<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHAVSU</title>
  <!-- Link to external CSS file -->
  <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>

<body>

  <div class="container">
    <h1>CHAVSU - IMUS CAMPUS</h1>

    <!-- Text box for keywords -->
    <!--<label for="keywords">Keywords:</label>-->
    <textarea id="keywords" name="keywords" placeholder="Enter keywords..."></textarea>

    <!-- Text box for response -->
    <!--<label for="response">Response:</label>-->
    <textarea id="response" name="response" placeholder="Enter response..."></textarea>

    <!-- Save button -->
    <button id="saveButton">SAVE</button>
  </div>

  <!-- Table on the right side -->
  <div class="table-container">
    <table>
      <caption>Entered Data</caption>
      <thead>
        <tr>
          <th>Actions</th>
          <th>Keyword</th>
          <th>Response</th>
        </tr>
      </thead>
      <tbody id="keywordTableBody">
        <!-- Keywords will be dynamically added here -->
      </tbody>
    </table>
  </div>
  </div>

  <!-- Link to external JavaScript file -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>