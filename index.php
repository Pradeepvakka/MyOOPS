<?php require_once('functions_mine.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pagination</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php $q = pagination();?>
  <div class="container">

      <div class="page-header">
        <h1>Pagination</h1>
        <h4>Showing <?=$q['page']?> page / out of <?=$q['total']?></h4>
        <div class="row">
         <?=$q['links']?>
      </div>

      <?php 
      foreach ($q['data'] as $row) {
      ?>
          <div class="row">
            <div class="col-md-6"><?= $row['Name']?></div>
            <div class="col-md-6"><?= $row['District']?></div>
          </div>
      <hr>
      <?php 
      }
      ?>

     
      <div class="row">
         <?=$q['links']?>
      </div>
    </div> <!-- /container -->

  
    
  </body>
</html>