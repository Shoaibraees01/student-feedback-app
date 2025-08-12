<?php
// index.php - main UI
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Student Feedback Tracker</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="wrap">
    <header>
      <h1>Student Feedback</h1>
      <p class="lead">Add, view, edit and delete feedback — powered by PHP + MySQL (XAMPP)</p>
    </header>

    <section class="card form-card">
      <form id="feedbackForm">
        <input type="hidden" id="fid" value="">
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" placeholder="Your name" required>
          </div>
          <div class="col">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="you@example.com" required>
          </div>
        </div>

        <div class="row">
          <label for="feedback">Feedback</label>
          <textarea id="feedback" name="feedback" rows="4" placeholder="Write feedback..." required></textarea>
        </div>

        <div class="actions">
          <button type="submit" id="saveBtn" class="btn primary">Add Feedback</button>
          <button type="button" id="cancelEdit" class="btn mute" style="display:none">Cancel</button>
        </div>
      </form>
    </section>

    <section class="card list-card">
      <h2>All Feedback</h2>
      <div id="tableWrap">
        <table id="feedbackTable" aria-live="polite">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Feedback</th>
              <th>When</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- rows inserted by JS -->
          </tbody>
        </table>
        <p id="emptyMsg" class="muted">No feedback yet — add one above.</p>
      </div>
    </section>

    <footer>
      <small>Built with PHP, PDO & MySQL. Place folder in XAMPP <code>htdocs</code> and import <code>database.sql</code>.</small>
    </footer>
  </div>

  <script src="assets/js/script.js"></script>
</body>
</html>
