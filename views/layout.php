
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style media="screen">
      .btn, .crossbtn{cursor: pointer;}
      a:hover {text-decoration: none;}
      a:focus {text-decoration: none;}
      span.text-muted > a,
      h5 {color: #292b2c !important}
      body{position:relative;display:block;min-height: 100vh;}
      .wrapper-content{padding-bottom: 100px;}
      footer.footer {background-color:#f7f7f7;position:absolute;bottom:0;left:0;right:0;}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
      <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">Meal MS</a>

      <div class="collapse navbar-collapse" id="navbar">

        <?php if (Session::check('userlogin') == true) : ?>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">&bumpE; Home</a>
          </li>
          <?php if(Session::get('userroleid') == 2): ?>
          <li class="nav-item">
            <a class="nav-link" href="deposit.php">&oplus;</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="deposit-list.php">&Xi; Deposit</a>
          </li>
          <?php if(Session::get('userroleid') == 2): ?>
          <li class="nav-item">
            <a class="nav-link" href="cost.php">&oplus;</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="cost-list.php">&Xi; Cost</a>
          </li>
          <?php if(Session::get('userroleid') == 2): ?>
          <li class="nav-item">
            <a class="nav-link" href="meal.php">&oplus;</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="meal-list.php">&Xi; Meal</a>
          </li>
        </ul>
        <?php endif; ?>

        <ul class="navbar-nav ml-auto">

          <?php if (Session::check('userlogin') == true) : ?>

          <li class="nav-item">
            <a class="nav-link">&cire; <?php echo Session::get('userfullname'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php?action=logout">&ominus; Logout</a>
          </li>

          <?php else: ?>

            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registration.php">Registration</a>
            </li>

          <?php endif; ?>

        </ul>
      </div>
      </div>
    </nav>

    <div class="container mt-3 wrapper-content">
    	<div class="row">

          <?php include($path); ?>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

    <footer class="footer pt-3 pb-2">
      <div class="container text-center">
        <span class="text-muted">&copy;2017<a href="https://developercanvas.com/" target="_blank"> Developer Canvas</a> - All right reserved.</span>
      </div>
    </footer>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
        $('span.crossbtn').click(function(){
          $(this).parent().hide();
        });
        setTimeout(function() {
             $("span.crossbtn").parent().hide(500);
         }, 10000);
      });
    </script>
  </body>
</html>
