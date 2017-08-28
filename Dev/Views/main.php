<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Newsboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./Assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link href="./Assets/css/main.css" rel="stylesheet">
        <style>
            /* body{padding:25px;} */
            </style>

    </head>
    <body>
    <nav class="navbar navbar-default" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Newsboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo ROOT_PATH; ?>">Home</a></li>
            <li><a href="<?php echo ROOT_PATH; ?> /shares">Shares</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php if(isset($_SESSION['is_logged_in'])): ?>
            <li><a href="<?php echo ROOT_PATH; ?>">Welcome <?php echo $_SESSION['user_data']['email']; ?></a></li>
            <li><a href="<?php echo ROOT_PATH; ?>/users/logout">Logout</a></li>
            <?php else: ?>
            <li><a href="<?php echo ROOT_PATH; ?>/users/login">Login</a></li>
            <li><a href="<?php echo ROOT_PATH; ?>/users/register">Register</a></li>
            <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <div class="row">
           <?php Messages::display(); ?>
            <?php require($view); ?>
        </div>
    </div>
    </body>
</html>