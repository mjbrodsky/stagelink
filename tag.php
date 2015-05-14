
<?php 



$url='http://performances.lincolncenter.org/api/v1/programs?limit=100&date='.$_POST['date'];
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
$j = (json_decode($result, true));
$program_id = $j[0]['id'];






$url='http://performances.lincolncenter.org/api/v1/programs/'.$program_id.'/performances/';
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
$j = (json_decode($result, true));
//echo '<pre>';
//print_r($j[0]);
$performances = $j;
$perfomrance_id = $j[0]['id'];










//venue
$url='http://performances.lincolncenter.org/api/v1/programs/'.$program_id.'/venues/';
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
$j = (json_decode($result, true));
$venues = $j;





//location
$url='http://performances.lincolncenter.org/api/v1/programs/'.$program_id.'/events/';
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
$j = (json_decode($result, true));
$location = $j;








$url='http://performances.lincolncenter.org/api/v1/performances/'.$perfomrance_id.'/persons/';
//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
$j = (json_decode($result, true));
//print_r($j);

$persons=$j;



?>












<!doctype html>

<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>StageLink</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css(.) styles/vendor.css -->
    <!-- bower:css -->
    <!-- endbower -->
    <!-- endbuild -->
    <!-- build:css(.tmp) styles/main.css -->
    <style>
      .form-control{
        width:200px;
      }
      .ytVideos{
        height:350px;
        width:1460px;
        margin-left:30px;
      }
      .ytVideos iframe{
        margin-right:25px;
      }

      .gImagesPanel img{
          height: 200px;
      }
      .gImagesPanel{
          padding:30px;
      }
      
    </style>
    <!-- endbuild -->
  </head>
  <body>
    <!--[if lt IE 10]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="/index.php">Upload New Image</a></li>
        </ul>
        <h1 class="text-muted"><img style="width: 60px; " src="NY-phil-logo.jpg" /><img style="width: 60px; " src="lc_logo" />StageLink</h1>
      </div>


      <div class="row marketing">
        <div class="col-lg-6">
          
          <?php
          $files = scandir('uploads', SCANDIR_SORT_DESCENDING);
          $newest_file = $files[0];
          echo '<img style="width:600px;height:auto;max-width:100%" src="uploads/'.$newest_file.'"/>';
          ?>
        </div>

        <div class="col-lg-6">
            <h4>These artists are associated with this program. Are they in the photo?</h4>
            <form>
            <?php


            foreach($persons as $row){
              echo '<div><input type="checkbox"> <label style="cursor:pointer;" onclick="getData(\''.$row['firstname'].' '.$row['lastname'].'\');false;">'.$row['firstname'].' '.$row['lastname'].'</label></div>';
            }


            ?>
            <button type="submit" class="btn btn-default">Submit</button>

            <div class="well" style="margin-top:10px;">
              <h4>New York Philharmonic Program Information:</h4>
              <?php 
              foreach($venues as $row){
                echo '<div>Venue: '.$row['name'].'</div>';
              }
              foreach($location as $row){
                echo '<div>Location: '.$row['location'].'</div>';
                echo '<div>Date: '.$row['date'].'</div>';
              }
              ?>
            </div>
          </form>
        </div>

          <p id="progressBar"></p>
          <p id="apiUrl"></p>
          <!-- Button HTML (to Trigger Modal) -->
           
          <!-- Modal HTML -->
          <div id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">This name from around the web</h4>
                      </div>
                      <div class="modal-body">
                        <h4>From Wikipedia:</h4>
                          <ul class="wikiExcerpt">
                          </ul>
                          <h4>From Google Images:</h4>
                          
                            <div class="gImagesPanel">
                            </div>

                          <h4>From Youtube:</h4>
                          <div style="overflow:scroll;width:500px;">
                            <div class="ytVideos">
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                  </div>
              </div>
          </div>

        </div>
      </div>

    </div>


    <!-- build:js(.) scripts/vendor.js -->
    <!-- bower:js -->
    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

        <!-- build:js({app,.tmp}) scripts/main.js -->
        <script src="main.js"></script>
        <!-- endbuild -->
</body>
</html>
