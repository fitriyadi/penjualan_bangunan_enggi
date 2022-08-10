 <?php
  require_once '../setting/konstanta.php';
  require_once '../setting/koneksi.php';
  require_once '../setting/crud.php';
  require_once '../setting/helper.php';
  require_once '_partials/_link.php';

  session_start();
  $_SESSION['admin'] = '1';

  //Cek Debug
  $debug = true;
  if ($debug == true) :
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  endif;

  if (isset($_SESSION['admin'])) {
  ?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title><?= judul ?></title>
     <!-- core:css -->
     <?php require_once '_partials/_css.php' ?>
     <!-- End layout styles -->

   </head>

   <body class="sidebar-dark">
     <div class="main-wrapper">

       <!-- partial:../../partials/_sidebar.html -->
       <nav class="sidebar">
         <div class="sidebar-header">
           <a href="#" class="sidebar-brand" style="font-size: 20px;">
             <?= nav ?>
           </a>
           <div class="sidebar-toggler not-active">
             <span></span>
             <span></span>
             <span></span>
           </div>
         </div>

         <div class="sidebar-body">
           <?php require_once '_partials/_menu.php' ?>
         </div>
       </nav>
       <!-- partial -->

       <div class="page-wrapper">

         <!-- partial:../../partials/_navbar.html -->
         <?php require_once '_partials/_header.php'; ?>
         <!-- partial -->

         <div class="page-content">
           <?php
            $hal = @$_GET['hal'];
            $modul = "modul/";
            $default = "404.php";
            if (!$hal) {
              require_once "$default";
            } else {
              switch ($hal) {
                case $hal:
                  if (is_file($modul . $hal . ".php"))
                    require_once $modul . $hal . ".php";

                  else
                    require_once $default;
                  break;
                default:
                  require_once $default;
              }
            }
            ?>

         </div>

         <!-- partial:../../partials/_footer.html -->
         <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
           <?php require_once '_partials/_footer.php'; ?>
         </footer>
         <!-- partial -->

       </div>
     </div>

     <!-- core:js -->
     <?php require_once '_partials/_js.php'; ?>
     <!-- end custom js for this page -->
   </body>

   </html>

   </script> -->
 <?php
  } else {
    echo "<script>window.location='../index.php';</script>";
  }
  ?>