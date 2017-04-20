<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>e-Project | Integrated LMS in AIS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="E-learning terintegrasi Sistem Informasi Akademik">
        <meta content='id' name='language'/>
        <meta content='id' name='geo.country'/>
        <meta content='Indonesia' name='geo.placename'/>
        <meta name="keywords" content="e-Learning,UNBK,Akademik">
        <meta name="author" content="Harjito, zano.amrhakim@gmail.com">
        <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
        <!--
        <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
        <script src='https://www.google.com/recaptcha/api.js'></script>   
        <link href="/fonts/fonts.css" rel="stylesheet" type="text/css" />
        <link href="/assets/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/styles.css?a=<?=microtime()?>" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
        <script type="text/x-mathjax-config">
          MathJax.Hub.Config({
            tex2jax: {
              inlineMath: [["$","$"],["\\(","\\)"]]
            }
          });
        </script>
        -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!--
        <script src='https://www.google.com/recaptcha/api.js'></script>   
        -->
        <!--FONT-AWESOME-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><!--ADMIN-lte-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.8/css/AdminLTE.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.8/css/skins/_all-skins.min.css" />
        <link href="/assets/css/styles.css?a=<?=microtime()?>" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
    </head>
    <body class="skin-blue layout-boxed" id="pbl" onload="loader();">
        <div id="help" style="display:none">
            <h5>PANDUAN PENGGUNA<a href="#" class="btn btn-close-help pull-right">X</a></h5>
            <div id="helpContent">aaa</div>
        </div>
        <div id="myTest" style="display:none">
            <div id="splashTest" class="ontest"></div>
            <div id="navigation" class="ontest"></div>
            <div id="timer">
                <span id="hourTest" class="ontest"></span>
                <span> : </span>
                <span id="minuteTest" class="ontest"></span>
                <span> : </span>
                <span id="secondTest" class="ontest"></span>
            </div>
            <div id="question">
                <label>Soal No <span id="question-number"></span></label>
                <div id="question-text"  class="ontest"></div>
            </div>
            <div id="option" style="text-align:left;padding-left:20px">
                <label>Jawaban</label>
                <div id="list-option"  class="ontest"></div> 
            </div>
            <div id="media" class="ontest" style="position:absolute;top:-500px;"></div>
            <div id="buttonbar" class="ontest"></div>
        </div>
        <div id="sheetAssessment" style="display:none">
           <div id="subject" class="subject">
                <ul class="nav nav-tabs" id="navSubject">
                </ul>
                <div id="viewSubject" class="onReview" style="padding-right:20px;padding-left:20px;">
                    <div id="subjectContent"></div>
                </div>
            </div>
            <div id="panelInstrument" class="subject">
                <div id="panelInstrumentReview" class="onReview">

                </div>
                <div id="viewInstrumentReview">
                    <div id="viewInstrument" class="onReview"></div>
                    <h4>Comentar (Wajib)</h4>
                    <span contentEditable="true" id="comment" class="comment form-control editable-html" style="min-height:38px"></span>
                    <div id="viewRubric" class="onReview rubric">
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-danger cls-assessment pull-right">
                <i class="fa fa-power-off"></i>  Selesai
            <a>
        </div>
        <div id="loader-bar" style="display:none;position:absolute;margin-left:50%;margin-top:200px;z-index:9999"></div>
        <div id="myModal" class="modal fade in" role="dialog">
            <div class="modal-dialog" id="dialog-body"></div>
        </div>
        <div id="tooltips" style="display:none"></div>
        <div id="page" class="wrapper" style="background-color: #ffffff">
            <header class="main-header" id="navbar"> 
                <a href="#" class="logo">
                    <b>e-Project</b>
                </a> 
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> 
                        <span class="sr-only">Toggle navigation</span> 
                    </a>
                    <span id="menubar">
                    </span>
                </nav>
            </header>
            <aside class="main-sidebar" id="side-container">
                <section class="sidebar"> 
                    <ul class="sidebar-menu" id="sidebar"> 
                        <li class="header">MAIN NAVIGATION </li>
                    </ul>

                </section>
            </aside>
            <div id="message-box" style="position:fixed;display:none;margin:0 20px 0 20px;z-index:9999">Selamat datang di situs belajar online SMA Negeri 1 Demak. Situs ini bagian dari project PBLAAMS dengan hak cipta yang telah terdaftar di Kemenkumham dengan No. Reg 08000 </div>
            <div  class="content-wrapper" style="margin-bottom:20px">
                <section id="workspace" class="content" style="padding-left:0;padding-right:0;display:none">
                </section>
                <div id="popup" class="row" style="display:none"></div>
                <section id="showcase" class="content" style="padding:10px 0 0 0;">
                    <div id="panel" class="col-sm-8 showcase" style="margin-bottom: 40px;">
                        <div id="panelAuth"></div>
                        <div id="panel-article"></div>
                    </div>
                    <div id="info" class="col-sm-4" style="padding:0 0 0 0;margin-top:-20px">
                        <div id="last_news" class="list-group">
                            <h3 class="list-group-item active">Berita</h3>
                        </div>
                     </div>
                </section>
            </div>
            <footer class="footer main-footer" id="footer" style="background-color:rgba(238, 238, 238, 0.58);height:20px;padding-top:5px;z-index:999;text-align: center">
                <b><a href="#" data-toggle="modal" data-target="#myModal" id="logo">PBLAAMS</a> 
                    Version</b> 1.0 
                <strong>Copyright © 2014-2016 .</strong> All rights reserved.
            </footer>
        </div>
        <iframe name="uploadFrame" id="uploadFrame" style="display:none">
        </iframe>
        <!--
        <script src="/assets/plugins/jquery-2.1.4.min.js"></script>
        <script src="/assets/plugins/jquery.table2excel.min.js"></script>
        <script src="/assets/plugins/jquery.readmore.min.js"></script>
        <script src="//cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
        <script src="/assets/plugins/jquery-ui.min.js" type="text/javascript"></script>
        <script src="/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.8/js/app.min.js"></script>   
        <script type="text/javascript">
            var h = $(window).height()-$('#footer').height();
            console.log(h)
            $('#pbl').css({'height':$(window).height()-$('#footer').height()});
            $('#side-container').css({'height':$(window).height()-$('#footer').height()-$('#navbar').height()});
            $('#dialog-body').html('<div class="progress" style="margin-top:200px">'+
                       '<div class="progress-bar progress-bar-striped active" role="progressbar" '+
                        'aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width:5%">'+
                        '5% Load data ...</div></div>');    

        </script>
        <script src="assets/js/constant.js" type="text/javascript"></script> 
        <script src="assets/js/function.js" type="text/javascript"></script> 
        <script src="assets/js/event.js?a=" type="text/javascript"></script>   
        -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="/assets/plugins/jquery.table2excel.min.js"></script>
        <script src="//cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
        <!--jquery-ui-->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="  crossorigin="anonymous"></script>
        <!--BOOTSTRAP-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.8/js/app.min.js"></script>   
        <script src="/assets/plugins/jquery.readmore.min.js"></script>
        <script type="text/javascript">
            $('#pbl').css({'height':$(window).height()-$('#footer').height()});
            $('#page').css({'height':$(window).height()-$('#footer').height()})
            $('#dialog-body').html('<div class="progress" style="margin-top:200px">'+
                       '<div class="progress-bar progress-bar-striped active" role="progressbar" '+
                        'aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width:5%">'+
                        '5% Load data ...</div></div>');    
        </script>        
        <script src="assets/js/constant.js?a=20170116-<?=date('ymdHis')?>" type="text/javascript"></script> 
        <script src="assets/js/function.js?a=20170116-<?=date('ymdHis')?>" type="text/javascript"></script> 
        <script src="assets/js/event.js?a=20170116--?<?=date('ymdHis')?>" type="text/javascript"></script>     
    </body>
</html>
