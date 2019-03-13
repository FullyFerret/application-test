<?php
/* application-test - index.php
   Forked by Eric Amshukov */

/* Initial data */
$people = array(
    array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
    array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
    array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
    array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
    array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
 );
?>

<!doctype html>
 <html>
   <head>
      <title>People</title>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" integrity="sha256-HtCCUh9Hkh//8U1OwcbD8epVEUdBvuI8wj1KtqMhNkI=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-modal-wrapper@1.0.16/dist/bootstrap-modal-wrapper-factory.min.js" integrity="sha256-U4z/KrjsWdHkqkQuhH8u4ph+EzRjzNnAlDjqYSjMcns=" crossorigin="anonymous"></script>
      <script src="app.js"></script>

   </head>

   <body>
      <div class="container">
         <header class="row">
            <h2 class="pb-2 mt-4 mb-5 border-bottom mx-auto">People</h2>
         </header>
         <section class="row">
            <div class="col-sm-12">
               <table class='table table-striped table-hover table-borderless fadeIn animated'>
                  <caption><span class="mr-2"><i class="fas fa-users"></i></span><span class="d-none d-md-inline-block"> List of people</span></caption>
                  <thead>
                     <tr>
                        <!-- Assuming everyone will have the same information -->
                        <?php if (!empty($people)) foreach (array_keys($people[0]) as $k => $cellHeader) { ?>
                           <th class="<?= $k ?>"><?= $cellHeader ?></th>
                        <?php } ?>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($people as $person) { ?>
                        <tr>
                           <?php foreach ($person as $k => $column) { ?>
                              <!-- Escape user data to prevent XSS -->
                              <td class="<?= $k ?>"><?= htmlspecialchars($column, ENT_QUOTES, 'UTF-8') ?></td>
                           <?php } ?>
                           <td>
                              <button class='btn btn-outline-primary'><span class="mr-2"><i class="far fa-bell"></i></span><span class="d-none d-md-inline-block"> Alert</span></button>
                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </section>
         <noscript>
            <section class="row">
               <div class="col-sm-12">
                  <div class="alert alert-warning fadeIn animated"><span class="mr-2"><i class="fas fa-exclamation-triangle fa-fw"></i></span> Some things won't run without JavaScript, please enable it and refresh the page.</div>
               </div>
            </section>
         </noscript>
      </div>
   </body>
 </html>