
<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">

   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <title>{{$namasitus}}</title>
   <meta name="description" content="This Site Is Under Contraction, Please Contact The Web Administrator">
   <meta name="author" content="pixelcave">
   <meta property="og:title" content="This Site Is Under Contraction, Please Contact The Web Administrator">
   <meta property="og:site_name" content="PDF Library">
   <meta property="og:description" content="This Site Is Under Contraction, Please Contact The Web Administrator">
   <meta property="og:type" content="website">
   <meta property="og:url" content="https://rendrian.id">
   <meta property="og:image" content="/assets/images/facebooklive.png">

   <link rel="shortcut icon" href="/assets/images/favicon.png">
   <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/favicon.png">
   <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon-180x180.png">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
   <link rel="stylesheet" id="css-main" href="/assets/css/dashmix.min-1.5.css">

</head>
<body>
   <div id="page-container" class="page-header-fixed page-header-glass main-content-boxed side-trans-enabled">
      <header id="page-header" class="js-appear-enabled animated fadeInDown" data-toggle="appear" data-class="animated fadeInDown" data-timeout="600">
         
         <div id="page-header-search" class="overlay-header bg-primary">
            <div class="content-header">
               <form class="w-100" action="be_pages_generic_search.html" method="POST">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                           <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                     </div>
                     <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                  </div>
               </form>
            </div>
         </div>
         <div id="page-header-loader" class="overlay-header bg-primary-darker">
            <div class="content-header">
               <div class="w-100 text-center">
                  <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
               </div>
            </div>
         </div>
      </header>

      
      <main id="main-container">

         <div class="bg-body-dark">
          <div class="content">
           <div class="text-center py-3">
            <h1 class="h3 font-w700 mb-2">{{$namasitus}}</h1>
            <h2 class="h5 font-w400 text-muted">Over Billions PDF Document Avaliable!</h2>
         </div>
         <form action="/" method="POST" onsubmit="return false;">
            <div class="form-group">
             <input type="text" class="form-control form-control-lg py-3 text-center" id="dm-booking-destination" name="dm-booking-destination" placeholder="Find Document / Book Here">
          </div>
          <div class="form-group row items-push mb-0">


            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-block">Search</button>
           </div>
        </div>
     </form>
  </div>
</div>



<div class="content content-full">
   <div class="row">
      <div class="block-content">
         <table class="table table-borderless table-striped table-vcenter">
            <tbody>

               <?php 
               $r = array_rand($items,100); 

               $no = 1;
               ?>




               @for($i=0;$i<=99;$i++)
               <tr>

                  <td style="width: 32px;">
                     <i class="fa fa-circle text-success"></i>
                  </td>
                  <td class="d-sm-table-cell">
                     <a href="{{kwPdf($items[$r[$i]])}}"><strong>{{ucwords($items[$r[$i]])}}</strong></a>
                  </td>
                  <td class="d-sm-table-cell text-right text-muted">
                     <a href="{{kwPdf($items[$r[$i]])}}">
                        <button type="button" class="btn btn-sm btn-success d-lg-inline-block mb-1">
                           <i class="fa fa-chevron-circle-right fa-fw mr-1"></i> Details
                        </button>
                     </a>
                  </td>
               </tr>

               @endfor




            </tbody>
         </table>
      </div>
   </div>
</div>

<div class="content content-full">
   <div class="row">
      <div class="block-content " style="display: none;">
         <?php autoPing($urlsitus); ?>
      </div>
   </div>
</div>








</main>
<footer id="page-footer" class="bg-white border-top">
   <div class="content py-0">
      <div class="row font-size-sm">
         
         <div class="col-sm-12 order-sm-1 text-center text-sm-center">
           Copyright © 2006 - {{date('Y')}} - <a href="{{url('/sitemap_index.xml')}}">Sitemap</a>
         </div>
      </div>
   </div>
</footer>
</div>
<script src="/assets/js/dashmix.core.min-1.4.js"></script>
<script src="/assets/js/dashmix.app.min-1.4.js"></script>



</body>
</html>