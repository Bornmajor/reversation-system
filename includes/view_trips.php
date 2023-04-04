<?php
include 'connection.php';
include 'functions.php';


if(isset($_POST['date_trip'])){


   $from =  $_POST['from'];
   $to = $_POST['to'];
   $date_trip = $_POST['date_trip'];

   $from = escapeString($from);
   $to = escapeString( $to);
   $date_trip = escapeString($date_trip);

   $query = "SELECT * FROM routes WHERE from_area = '$from' AND to_area = '$to'";
   $select_route_id = mysqli_query($connection,$query);
   checkQuery($select_route_id);
   while($row = mysqli_fetch_assoc($select_route_id)){
   $the_route_id =  $row['route_id'];
   }
   if(isset($the_route_id)){

  

   $query = "SELECT * FROM trips WHERE route_id = $the_route_id";
   $view_trip = mysqli_query($connection,$query);
   checkQuery($view_trip);
   $total_trips = mysqli_num_rows($view_trip);
   if($total_trips == 0){
    echo "<h1>No available trips</h1>";
   }
   while($row = mysqli_fetch_assoc($view_trip)){
    $trip_id = $row['trip_id'];
   $plate_no = $row['plate_no'];
   $db_route_id = $row['route_id'];
   $db_date_trip = $row['date_trip'];
   $departure_time = $row['departure_time'];
   $arrival_time = $row['arrival_time'];
   ?>
    <div class='trip_card'><!--trip_card-->

<div class='trip_bus_img'><img src="images/bus.png" alt="<?php echo $plate_no ?>"></div>
<?php
//get route name
$query = "SELECT * FROM routes WHERE route_id = $db_route_id";
$select_routes = mysqli_query($connection,$query);
checkQuery($select_routes);
while($row = mysqli_fetch_assoc($select_routes)){
   $from_area = $row['from_area'];
   $to_area = $row['to_area'];
   $vip_price = $row['vip_price'];
   $business_price = $row['business_price'];
   $economy_price = $row['economy_price'];
}
?>
<div class="trip_route">
   <div><?php echo $from_area . " - ".$to_area ?></div>
   <div class='dept_arr'><span class='class_title'>Departure time</span>: <?php echo $departure_time ?></div>
   <div class='dept_arr'><span class='class_title'>Arrival time</span>: <?php echo $arrival_time ?></div>
</div>
<div class="amenities">
    <div>Amenities</div>
        <img class="amenities_img"  src="images/tv.png" alt="Tv" title='TV'>
        <img class="amenities_img"  src="images/wifi.png" alt="Wifi" title='Wifi'>
        <img class="amenities_img"  src="images/charging.png" alt="Power outlet" title='Power outlet'>
    
</div>

<div class="trip_price"><!--trip_price-->
    <div class="classes_trips">
        <div class="vip"><span class='class_title'>First class</span>: <?php echo $vip_price ?> </div>
        <div class="business"><span class='class_title'>Business class</span>: <?php  echo $business_price?> </div>
        <div class="economy"><span class='class_title'>Economy class</span>: <?php echo $economy_price ?> </div>
    </div>
</div><!--trip_price-->

<div class="btn_view">
    <div class="available_seats">14 seats </div>
    <a href="bus_layout.php?trip_id=<?php echo $trip_id ?>&date_trip=<?php echo $date_trip ?>" class='btn btn-primary' rel='<?php echo $trip_id ?>'>View seats</a>
</div>

</div><!--trip_card-->
<div class="bus_layout">
    <?php 
    
    ?>
</div>
   <?php 
    }
   }else{
    echo "<h1>Route unavailable!!</h1>";
}



}
?>