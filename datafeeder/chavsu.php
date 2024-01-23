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
  <link rel="stylesheet" type="text/css" href="css/chavsu.css">

  <!-- Link to external JavaScript file -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/datatables.js"></script>
  <script src="js/alpine.min.js"></script>
  <script src="js/chavsu.js"></script>

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>

  <!-- Logout nav -->
  <a href="#" id="logout" title="Log out" aria-hidden="true">
    <i class="fa fa-sign-out" style="font-size: 18px;"></i>
  </a>

  <section class="section">
    <h1 class="title">ChavSU DATA ENTRY</h1>
    <!-- Add data nav -->
    <div id="add-data" class="flex flex-row-reverse pb-4 px-4 text-xl font-extrabold float-none">
      <button class="text-white rounded-2xl text-lg w-60 py-3 inset-y-0 right-0 focus:outline-none js-modal-trigger" data-target="add_kwords_form">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add New Data
      </button>
    </div>

    <div class="container is-fluid">
      <div class="columns">

        <!-- Table Entry -->
        <div class="h-full overflow-y-auto px-2">
          <div class="dataTables_wrapper no-footer">
            <table class="display" id="keyword-tbl">
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

  <!-- Add New Data -->
  <div id='add_kwords_form' class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Add New Data</p>
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
        <button class="button is-success" id='saveButton'>Save</button>
        <button class="button cancel">Cancel</button>
      </footer>
    </div>
  </div>

  <!-- Update Data -->
  <div id='upd_kwords_form' class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Edit Data</p>
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

</body>

</html>