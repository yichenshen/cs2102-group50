<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title>KACHING!</title>

  <!-- JS -->
  <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
  <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->
  <script src="<?php echo URL; ?>bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript"
          src="<?php echo URL; ?>bower_components/chart.js/dist/Chart.min.js"></script>

  <!-- CSS -->
  <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">

  <!--Import Google Icon Font-->
  <link href="<?php echo URL; ?>bower_components/material-design-icons-iconfont/dist/material-design-icons.css"
        rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet"
        href="<?php echo URL; ?>bower_components/materialize/dist/css/materialize.min.css" media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<header>
  <nav class="primary-700" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">KACHING</a>

      <ul class="right hide-on-med-and-down">
        <?php if (!$this->User->loggedIn()) { ?>
          <li><a href="/projects">Browse</a></li>
          <li><a href="/login">Login</a></li>
        <?php } else { ?>
          <li><a href="/admin">My Account</a></li>
          <li><a href="/projects">Browse</a></li>
          <li><a href="/login/logout">Logout</a></li>
        <?php } ?>
      </ul>

      <div class="search-bar hide-on-med-and-down">
        <nav class="z-depth-0 center primary-700">
          <div class="nav-wrapper">
            <form action="/projects/search" method="get">
              <div class="input-field">
                <input id="search" type="search" name="search" placeholder="Search Projects"
                       value="<?php echo isset($search) ? $search : "" ?>">
                <label for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
              </div>
            </form>
          </div>
        </nav>
      </div>

      <ul id="nav-mobile" class="side-nav">
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</header>

<main>
