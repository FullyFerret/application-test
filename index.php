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

 /* Reduce people to <tr> rows */
$rows = array_reduce($people, function($rows, $row) {
   $columns = "";

   /* Grab each column and key information for selecting */
   foreach($row as $k => $column){
      $columns .= "<td class='$k'>$column</td>";
   }
   return $rows . 
            "<tr>" .
               $columns . 
               "<td>
                  <button class='btn btn-outline-primary'>Alert</button>
               </td>" .
            "</tr>";
});

/* Retrieve keys header cells assuming each person has identical sets of keys */
$headerCells = empty($people[0]) ? "" : array_reduce(array_keys($people[0]), function($cells, $cell) {
   return $cells . "<th>$cell</th>";
});

/* Construct table from created rows */
$table = "<table class='table table-hover table-borderless fadeIn animated'>
            <caption>List of people</caption>

            <thead>
               <tr>$headerCells</tr>
            </thead>
            <tbody>$rows</tbody>
         </table>";
?>

<!doctype html>
 <html>
   <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" integrity="sha256-HtCCUh9Hkh//8U1OwcbD8epVEUdBvuI8wj1KtqMhNkI=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <title>People Table</title>

      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-modal-wrapper@1.0.16/dist/bootstrap-modal-wrapper-factory.min.js" integrity="sha256-U4z/KrjsWdHkqkQuhH8u4ph+EzRjzNnAlDjqYSjMcns=" crossorigin="anonymous"></script>
      <script src="app.js"></script>
   </head>

   <body>
      <div class="container">
         <header class="row">
            <h2 class="pb-2 mt-4 mb-5 border-bottom mx-auto">People Table</h2>
         </header>
         <section class="row">
            <div class="col-sm-12">
               <?php echo $table; ?>
            </div>
         </section>
      </div>
   </body>
 </html>