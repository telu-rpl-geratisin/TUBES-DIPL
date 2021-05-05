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
	<ul class="sidenav sidenav-fixed">
    <li>
    	<div class="user-view">
        <div class="background">
          <img src="<?= base_url(); ?>/public/img/background03.jpg">
        </div>
        <a href="#user"><img class="circle user-avatar" src="<?= base_url(); ?>/public/img/person01.jpg"></a>
        <a href="#name"><span class="white-text name"><?= $user_fullname ?></span></a>
      </div>
    </li>
    <li><a class="waves-effect" href="#!"><i class="material-icons">people</i>Pengguna Publik</a></li>
  </ul>
  <div class="main-wrapper">
    <div class="header">
      <h5>Manage Pengguna Publik</h5>
    </div>
    <div class="main-content">
    
      <?= $this->renderSection('main') ?>
    
    </div>
  </div>

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>