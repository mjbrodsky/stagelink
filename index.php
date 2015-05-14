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
        margin-top:10px;
      }
      .ytVideos{
        height:350px;
        width:1500px;
        margin-left:30px;
      }
      .ytVideos iframe{
        margin-right:25px;
      }
      .modal-body{
        overflow:scroll;
      }

      .gImagesPanel img{
          height: 200px;
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
          <li class="active"><a href="#">Home</a></li>
        </ul>
        <h3 class="text-muted">StageLink</h3>
      </div>


      <div class="row marketing">
        <div class="col-lg-6">
          <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload" >
            <input type="submit" class="btn btn-default" value="Upload Image" name="submit">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000000"/>
            <input class="form-control" placeholder="Program Date" type="text" value="" name="date"/>
            <input class="form-control" placeholder="Program Title" type="text" value="" name="program_title"/>
            <input class="form-control" placeholder="Venue Name" type="text" value="" name="work_title"/>
          </form>
          <br><br>
          <!--
          <form action="#">
            Search terms: <input id="searchTerms" type="text" placeholder="Your Search Terms"></input>
            <input class="btn btn-default" id="submit" type="submit" value="Go" onclick="getData();false;"></input>
          </form>
  -->
          <p id="progressBar"></p>
          <p id="apiUrl"></p>
          <!-- Button HTML (to Trigger Modal) -->
           
          <!-- Modal HTML -->
          <div id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Results</h4>
                      </div>
                      <div class="modal-body">
                          <ul class="wikiExcerpt">
                          </ul>
                          <div class="gImagesPanel">
                          </div>
                          <div class="ytVideos">
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
    
    <!--
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/affix.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/alert.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/button.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/carousel.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/collapse.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/dropdown.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/tab.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/transition.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/scrollspy.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/modal.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/tooltip.js"></script>
    <script src="bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/popover.js"></script>
  -->
    <!-- endbower -->
    <!-- endbuild -->

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
