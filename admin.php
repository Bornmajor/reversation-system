<?php include 'includes/header.php'; ?>
    <title>Admin</title>
</head>
<body>
<!---navbar-->
<?php include 'includes/navbar.php'; ?>
<!---navbar-->


<div id="section1">


<div id='filter_trip'><!--filter_trip-->
<h2 style='text-decoration:underline;'>Form will be displayed here!!</h2>
<div id='content'>


</div>





</div><!--filter_trip-->

<div id="bus_routes" class="card" style="width: 18rem;"><!--bus_routes-->

<div class="card-header">
Based areas
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><span class='add_trip'>Create trip</span></li>
    <li class="list-group-item"><span>Add bus</span></li>
  </ul>


</div><!--bus_routes-->

</div>


<script>
    $('.add_trip').click(function(){
        $.post("includes/form_trip.php",{},function(data){
            $('#content').html(data);

        });



    });
</script>
    
<?php 
// include 'includes/footer.php'; 
?>