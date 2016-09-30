<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

  <title>Crowd</title>

  <!-- JS -->
  <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
  <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

  <!-- CSS -->
  <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">

  <!--Import Google Icon Font-->
  <link href="<?php echo URL; ?>bower_components/material-design-icons-iconfont/dist/material-design-icons.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet"
        href="<?php echo URL; ?>bower_components/materialize/dist/css/materialize.min.css" media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <script src="<?php echo URL; ?>bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
<header>
  <nav class="primary-500" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Crowd</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/projects">Projects</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
</header>

<main>
