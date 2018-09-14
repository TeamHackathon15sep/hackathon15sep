<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IKM-Perizinan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/webpage/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/webpage/css/full-slider.css') ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      .modal-dialog {
        margin-top: 25%;
        margin-bottom: 0;
        height: 0px; /*100vh*/
        width: 90%;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .modal.fade .modal-dialog {
        transform: translate(0, -100%);
      }

      .modal.in .modal-dialog {
        transform: translate(0, 0);
      }
      /*.modal.modal-wide .modal-dialog {
        width: 90%;
        margin-top: 105px; margin-top: 150px;
      }*/
      .modal-wide .modal-body {
        overflow-y: auto;
      }

      /* irrelevant styling */
      body { text-align: center; }
      body p { 
        max-width: 400px; 
        margin: 20px auto; 
      }
      #tallModal .modal-body p { margin-bottom: 900px }
    </style>
    <style>
      .btn-outline {
          background-color: Transparent;
          background-repeat:no-repeat;
          border: none;
          cursor:pointer;
          overflow: hidden;
          outline:none;
      }
      .btn-outline:hover,
      .btn-outline:focus,
      .btn-outline:active,
      .btn-outline.active {
        color: white;
        background-color: #fdcc52;
        border-color: #fdcc52;
      }
      
    </style>
    <style>
    .center {
       width: 350px;
       height: 70px;
       position: absolute;
       left: 50%;
       top: 50%; 
       margin-left: -150px;
       margin-top: 90px;
    }
    .btn-survey {
      color: white;
      border-color: white;
      border: 1px solid;
    }
    .btn-survey:hover,
    .btn-survey:focus,
    .btn-survey:active,
    .btn-survey.active {
      color: white;
      background-color: #fdcc52;
      border-color: #fdcc52;
    }
    .btnsurvey {
      font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif';
      text-transform: uppercase;
      letter-spacing: 2px;
      border-radius: 300px;
    }
    .btn-xlsurvey {
      padding: 15px 45px;
      font-size: 30px;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">IKM-Perizinan</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div> -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo base_url('assets/img/webpage/1.jpg') ?>');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo base_url('assets/img/webpage/2.jpg') ?>');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('<?php echo base_url('assets/img/webpage/3.JPG') ?>');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <!-- Page Content -->
    <div class="container">
      <a data-toggle="modal" href="#shortModal" class="btnsurvey btn-survey btn-xlsurvey center">Mulai Survey!</a>
      <div id="shortModal" class="modal modal-wide fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="formsurvey" action="<?php echo site_url('webpage/jawabSurvey') ?>" method="post">
            <div class="modal-header">
              <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
              <h1 class="modal-title">
                <?php 
                  //foreach ($recordPertanyaan as $rP) {
                    echo $recordPertanyaan->desk_pertanyaan; 
                    echo "<input type='hidden' name='id_pertanyaan' value='$recordPertanyaan->id_pertanyaan'>";
                  //}
    ?>
      <input type='hidden' id='idjawab' name = 'id_jwb' value=''>
                
              </h1>
            </div>
            <div class="modal-body">
                  <?php
                    foreach ($recordJawaban as $rJ) {
                      echo "<button type='submit'  class='btn-outline id1' value='$rJ->id_jwb'><img src='assets/img/icon_jawaban/$rJ->icon_url' style='height:200px;width:200px;'/><br/><h2>$rJ->desk_jwb</h2></button>";
                      //echo "$rJ->desk_pertanyaan";
                    }
                  ?>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

      <!-- <a data-toggle="modal" href="#myModal" class="btn btn-primary">Open Modal</a> -->

      <div id="myModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                      <!-- <h4>Header</h4> -->
                      <img src="<?php echo base_url('assets/img/2705.png') ?>" style='height:300px;width:300px;'>
                  </div>
                  <div class="modal-body">
                      <h1>Terima Kasih atas partisipasinya.</h1>
                  </div>
              </div> 
          </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/webpage/js/jquery.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/webpage/js/bootstrap.min.js') ?>"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    <script type="text/javascript">
      // when .modal-wide opened, set content-body height based on browser height; 200 is appx height of modal padding, modal title and button bar
  var selesai = false;
      $(".modal-wide").on("show.bs.modal", function() {
        var height = $(window).height() - 200;
        $(this).find(".modal-body").css("max-height", height);
  
      });
  $('#formsurvey').submit(function(){
    //alert(selesai)
    if(selesai == true)
      return true;
    else{
      $('#myModal').modal('show');
      return false;
    }
  });
      $(".id1").click(function(){
  //alert('sdsd');
  $('#idjawab').val(this.value);
  //$('#formsurvey').submit(false);
        //$('#myModal').modal('show');
      });
    </script>
    <script>
      $(function(){
          $('#myModal').on('show.bs.modal', function(){
              var myModal = $(this);
              clearTimeout(myModal.data('hideInterval'));
              myModal.data('hideInterval', setTimeout(function(){
    selesai = true;
     $('#formsurvey').submit();
                  myModal.modal('hide');
              }, 5000));
          });
      });
    </script>

</body>

</html>
