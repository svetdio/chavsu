<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Panel ChavSU Data Feeder</title>
  <!-- Link to external CSS file -->
  <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bulma.css">
  <link rel="stylesheet" type="text/css" href="css/datatables.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <!-- Link to external JavaScript file -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/datatables.js"></script>
  <script src="js/script.js"></script>

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
  
<section class="section">
  <div class="container is-fluid">
    <div class="columns">
      <div class="column is-one-third">
        <!-- Left Content -->
        <div class="content">
          <h1>CHAVSU - IMUS CAMPUS</h1>

          <label class="label" id="keyw" for="keywords">Keywords:</label>
          <textarea class="textarea" id="keywords" name="keywords" placeholder="Enter keywords..."></textarea>

          <label class="label" id="resp" for="response">Response:</label>
          <textarea class="textarea" id="response" name="response" placeholder="Enter response..."></textarea>

          <div class="content has-text-centered">
            <button class='button is-success' id="saveButton">SAVE</button>
          </div>
        </div>
      </div>

      <div class="column">
        <!-- Right Content -->
        <div class="content">
          <table id="keyword-tbl">
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
    </div>
  </div>
</section>

<div id='upd_kwords_form' class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Edit Entry</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <div class="field">
        <label class="label" id="keyw" for="keywords">Keywords:</label>
        <textarea class="textarea" id="keywords" name="keywords" placeholder="Enter keywords..."></textarea>
      </div>
      <div class="field">
        <label class="label" id="resp" for="response">Response:</label>
        <textarea class="textarea" id="response" name="response" placeholder="Enter response..."></textarea>
      </div>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" id='upd_keyword'>Save</button>
      <button class="button cancel">Cancel</button>
    </footer>
  </div>
</div>

<div id="logout" class="logout-btn">
  <a class="button" href="#" style="color: #ff0000">
    <i class="fa fa-sign-out" aria-hidden="true" style="color: #ff0000; font-size: 20px;"></i>
  </a>
</div>

</body>
</html>