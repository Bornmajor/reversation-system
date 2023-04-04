<?php
global $connection;


function checkQuery($result){
    global $connection;
    if($result){

    }else{
        die("Query failed".mysqli_error($connection));
    
    }  
}
function successMsg($message){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
  '.$message.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';


}
function escapeString($string){
   global  $connection;
  return mysqli_real_escape_string($connection,$string);

}
function getBasedAreas(){
    global $connection;
    $query = "SELECT * FROM based_areas";
    $select_areas = mysqli_query($connection,$query);
   checkQuery($select_areas);

   while($row = mysqli_fetch_assoc($select_areas)){
   $county_id = $row['county_id'];
   $county_name = $row['county_name'];
   ?>
    <li class="list-group-item"><?php echo $county_name  ?></li>
 


 <?php  }
   
   
     
   }

   function getBuses(){
    global $connection;

   $query = "SELECT * FROM buses";
  $select_buses = mysqli_query($connection,$query);
  checkQuery($select_buses);
  while($row = mysqli_fetch_assoc($select_buses)){
    $plate_no = $row['plate_no'];
    $bus_class = $row['bus_class'];
    ?>
      <option value="<?php echo $plate_no ?>"><?php echo $plate_no ?></option>

  <?php }

   }
   function getRoute(){
    global $connection;

   $query = "SELECT * FROM routes";
  $select_routes = mysqli_query($connection,$query);
  checkQuery($select_routes);
  while($row = mysqli_fetch_assoc($select_routes)){
    $route_id = $row['route_id'];
    $from_area = $row['from_area'];
    $to_area = $row['to_area'];

    ?>
      <option value="<?php echo $route_id  ?>">
      <?php echo $from_area ." - ".$to_area ?>
    </option>

  <?php }

   }

   function createTrip(){
    global $connection;
    
    $plate_no = $_POST['plate_no'];
    $route_id = $_POST['route_id'];
    $departure_time = $_POST['departure_time'];
    $arrival_time =  $_POST['arrival_time'];
    $date_trip = $_POST['date_trip'];

   $plate_no = escapeString($plate_no);
   $route_id  = escapeString($route_id);
   $departure_time = escapeString($departure_time);
   $arrival_time  = escapeString($arrival_time);



    $query = "INSERT INTO trips(route_id,plate_no,departure_time,arrival_time,date_trip)VALUES($route_id,'$plate_no','$departure_time','$arrival_time','$date_trip')";
    $create_trip = mysqli_query($connection,$query);
   if($create_trip){
    successMsg('Create trip successfully');
   }
    

   }

   function displayBasedAreas(){
    global $connection;
    $query = "SELECT * FROM based_areas";
    $select_areas = mysqli_query($connection,$query);
   checkQuery($select_areas);
   while($row = mysqli_fetch_assoc($select_areas)){
    $county_id = $row['county_id'];
    $county_name = $row['county_name'];
    ?>
           <option><?php echo $county_name; ?></option>
   <?Php }


   }

?>