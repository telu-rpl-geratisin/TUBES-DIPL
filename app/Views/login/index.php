<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title; ?> | GERATISIN</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/css/style.css" />
</head>
<body>
  <div class="login-card-wrapper">
    <div class="card horizontal login-form-card">
      <div class="card-image">
        <img src="<?= base_url(); ?>/public/img/background01.jpg">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <h4>Login</h4>
          <form>
            <div class="input-field">
              <select>
                <option value="publik">Publik</option>
                <option value="perusahaan">Perusahaan</option>
                <option value="admin">Admin</option>
              </select>
              <label>Tipe Pengguna</label>
            </div>
            <div class="input-field">
              <input id="username" type="text" class="validate">
              <label for="username">Username</label>
            </div>
            <div class="input-field">
              <input id="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
            <button type="submit" class="login-btn waves-effect waves-light btn-small">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });
  </script>
</body>
</html>