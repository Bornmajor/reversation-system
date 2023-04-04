<?php include 'includes/header.php'; ?>
    <title>Homepage</title>
    <style>
        .container_seats{
            display:flex;
      
            justify-content:center;
        }
        .bus_layout{
            background-color:white;
             /* padding:10px; */
            margin:10px;
            max-height:520px;
            display:flex;
            border-radius:5px;
          
           
        }
        .keys_info{
            background-color:white;
            padding:10px;
            margin:10px;
            display:flex;
            border-radius:5px;
            flex-direction:column;
        }
      
        .bus_right{
            display:flex;
            flex-direction:column;
          
        }
        .centr{
            flex-direction:column-reverse;
        }
        .seat{
            background-color:#f1f1f1;
            /* padding:5px; */
            text-align:center;
            font-size:10px;
            margin:5px;
            width: 35px;
           padding:8px;
            border-radius:5px;
            cursor:pointer;
            
           
            
            /* display:inline-block; */
        }
        .booked_seat{
            background-color:red;
            padding:10px;
            border-radius:10px;
            margin:10px;
            color:white;
        }
        .empty_seat{
            background-color:#f1f1f1;
            padding:10px;
            border-radius:10px;
            margin:10px;
        }
        .booked_seat,.empty_seat{
            font-size:14px;
        }
        
        .booking_info{
            margin:20px;

        }
        .seats-classes{
            display:flex;
        }
        .vip_key,.business_key,.economy_key{
             padding:10px;
            border-radius:10px;
            margin:10px;
            background-color:#f1f1f1;
            font-size:12px;
        }
        .vip_key{
            
            border-top:2px solid blue;
           
           
        }
        .business_key{
         
            border-top:2px solid green;
           

        }
        .economy_key{
         
            border-top:2px solid orange;
           
        }
     

  
        .selected_seat{
            background-color:black;
            color:white;

        }

    </style>
</head>
<body>
<!---navbar-->
<?php include 'includes/navbar.php'; ?>
<!---navbar-->


<div class="container_seats"><!---container-->


    
<div class="bus_layout"><!---bus_layout-->

    


<div class="bus_right">
<div class='seat'  rel='2' seat-type='vip'>2</div>
<div class='seat' rel='6' seat-type='vip'>6</div>
<div class='seat' rel='10' seat-type='vip'>10</div>
<div class='seat' rel='14' seat-type='vip'>14</div>
<div class='seat' rel='18' seat-type='business'>18</div>
<div class='seat' rel='22' seat-type='business'>22</div>
<div class='seat' rel='26' seat-type='business'>26</div>
<div class='seat' rel='30' seat-type='business'>30</div>
<div class='seat' rel='34' seat-type='economy'>34</div>
<div class='seat' rel='38' seat-type='economy'>38</div>
<div class='seat' rel='42' seat-type='economy'>42</div>
<div class='seat' rel='46' seat-type='economy'>46</div>
</div>

<div class="bus_right">
<div class='seat' rel='3' seat-type='vip'>3</div>
<div class='seat' rel='7' seat-type='vip'>7</div>
<div class='seat' rel='11' seat-type='vip'>11</div>
<div class='seat' rel='15' seat-type='vip'>15</div>
<div class='seat' rel='19' seat-type='business'>19</div>
<div class='seat' rel='23' seat-type='business'>23</div>
<div class='seat' rel='27' seat-type='business'>27</div>
<div class='seat' rel='31' seat-type='business'>31</div>
<div class='seat' rel='35' seat-type='economy'>35</div>
<div class='seat' rel='39' seat-type='economy'>39</div>
<div class='seat' rel='43' seat-type='economy'>43</div>
<div class='seat' rel='48' seat-type='economy'>48</div>
</div>

<div class="bus_right centr">
<div class='seat' rel='49' seat-type='economy'>49</div>
</div>

<div class="bus_right">
<div class='seat' rel='4' seat-type='vip'>4</div>
<div class='seat' rel='8' seat-type='vip'>8</div>
<div class='seat' rel='12' seat-type='vip'>12</div>
<div class='seat' rel='16' seat-type='vip'>16</div>
<div class='seat' rel='20' seat-type='business'>20</div>
<div class='seat' rel='24' seat-type='business'>24</div>
<div class='seat' rel='28' seat-type='business'>28</div>
<div class='seat' rel='32' seat-type='business'>32</div>
<div class='seat' rel='36' seat-type='economy'>36</div>
<div class='seat' rel='40' seat-type='economy'>40</div>
<div class='seat' rel='44' seat-type='economy'>44</div>
<div class='seat' rel='49' seat-type='economy'>49</div>
</div>








</div><!---bus_layout-->   

<div class="keys_info"><!---keys_info-->  

<div class='keys_seats'><!---keys_seats-->  

    <h5 style='text-align:center;'>Keys</h5>
    <div class="booked_seat">Booked seats</div>
    <div class="empty_seat">Empty seats</div>

    <div class="seats-classes">
        <div class='vip_key'>First class</div>
    <div class="business_key">Business class</div>
    <div class="economy_key">Economy class</div>
    </div>
    

</div><!---keys_seats--> 

    <div class="booking_info"><!---booking_info--> 

  <?php
  $trip_id = $_GET['trip_id'];
  $query = "SELECT * FROM trips WHERE trip_id  = $trip_id";
  $get_route_id = mysqli_query($connection,$query);
  checkQuery($get_route_id);
  while($row = mysqli_fetch_assoc($get_route_id)){
   $route_id =  $row['route_id'];
   $departure_time = $row['departure_time'];
  }
  $query = "SELECT * FROM routes WHERE route_id = $route_id";
  $select_route = mysqli_query($connection,$query);
  checkQuery($select_route);
  while($row = mysqli_fetch_assoc($select_route)){
   $from_area = $row['from_area'];
   $to_area = $row['to_area'];

  }

  ?>

    <h4 style='text-decoration:underline;'>Bus information</h4>
    <div class='trip_info'>
        <div><img src="images/bus.png"  width='30px' alt=""></div>
        <div class='triproute'><?php echo $from_area ." <i class='fa fa-arrow-right'></i> ".$to_area ?></div>
    </div>
    <div class='depart_time'>
         <span style='font-weight:600;'>Departure time :</span> <?php echo $departure_time; ?>
    </div>
        <form action="" method="post">

            <div class='mb-3'>
            <label for="">Full names</label>
            <input type="text" name='traveller_name' class="form-control" >
          
            </div>

            <div class='mb-3'>
            <label for="">ID Number</label>
            <input type="text" name='traveller_id' class="form-control" >
          
            </div>

            <div id="view_price"><!--view_price-->

        

            </div><!--view_price-->
            



        </form>

    </div><!---booking_info--> 

</div><!---keys_info-->  


 </div><!---container-->   
 
 <script>

   $(document).ready(function(){

    $('[seat-type="vip"]').css("border-top","2px solid blue");
    $('[seat-type="business"]').css("border-top","2px solid green");
    $('[seat-type="economy"]').css("border-top","2px solid orange");
  

    // database array
    const rels_db = [<?php
            $trip_id = $_GET['trip_id'];
          $query = "SELECT seat_no FROM booking_space WHERE trip_id = $trip_id";
          $select_seat = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($select_seat)){
             $seats = $row['seat_no'];

             echo $seats.',';
      
          }
      
        
        ?>];
    for(i = 0; i < rels_db.length; i++){

   

 $('.seat').each(function(){

   let rel = $(this).attr("rel");
   
 
//    includes()
   if(rel == rels_db[i]){
    $(this).css("background-color","red");
    $(this).css("color","white");
    $(this).css("pointer-events","none");
    

   }

 });

}
$('.seat').click(function(){
    let seat_no = $(this).attr("rel");
    let trip_id = <?php echo $_GET['trip_id']; ?>;
    let seat_type = $(this).attr("seat-type");
    
    $.post("includes/check_fare.php",{seat_no,trip_id,seat_type},function(data){
    $('#view_price').html(data);
    });

    // $(this).toggleClass("selected_seat");
    

});


   });


 

 </script>
<?php include 'includes/footer.php'; ?>
