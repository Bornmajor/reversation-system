<?php include 'includes/header.php'; ?>
    <title>Homepage</title>
</head>
<body>
    


<!---navbar-->
<?php include 'includes/navbar.php'; ?>
<!---navbar-->

<!--section1-->
<?php
include 'home/filter_section.php';
?>
<!--section1-->

  <h3 style='display:flex;justify-content:center;'>Why us?</h3>

<!--section2-->
<?php
include 'home/home_services.php';
?>
<!--section2-->

<h3 style='display:flex;justify-content:center;'>Testimony from our loyal clients</h3>

<!--section3-->
<?php
include 'home/home_testimonial.php';
?>
<!--section3-->


<h2 style='display:flex;justify-content:center;'>Explore Kenya</h2>
<h5 style='display:flex;justify-content:center;'>We operate in all counties in Kenya.</h5>


<!--section3-->
<?php
include 'home/home_explore_places.php';
?>
<!--section3-->

<script>
 $(document).ready(function(){
  $('#form_search_bus').submit(function(e){
    e.preventDefault();
    var postData = $(this).serialize();

   $.post("includes/view_trips.php",postData,function(data){

    $('#content').html(data);
    $('#form_search_bus')[0].reset();




   });

  });




});
</script>
    
<?php include 'includes/footer.php'; ?>