<?php
include 'connection.php';
include 'functions.php';

$trip_id = $_POST['trip_id'];
$seat_no = $_POST['seat_no'];
$seat_type = $_POST['seat_type'];

$trip_id = escapeString($trip_id);
$seat_no = escapeString($seat_no);


$query = "SELECT * FROM trips WHERE trip_id = $trip_id";
$select_route = mysqli_query($connection,$query);
checkQuery($select_route);
while($row  = mysqli_fetch_assoc($select_route)){
 $select_route_id =   $row['route_id'];
}

$query = "SELECT * FROM routes WHERE route_id = $select_route_id";
$select_fare = mysqli_query($connection,$query);
checkQuery($select_fare);
while($row = mysqli_fetch_assoc($select_fare)){
  $vip =  $row['vip_price'];
  $business_price = $row['business_price'];
  $economy_price = $row['economy_price'];


}
// switch($seat_type)
if($seat_type == 'vip'){
  $fare = $vip;
}else if($seat_type == 'business'){
    $fare = $business_price;
}else{
    $fare = $economy_price;
}

?>
    <div class='mb-3'>
            <label for="">Seat No</label>
            <input type="text" style='border:none;' name='seat_no' class="form-control" value='<?php echo $seat_no ?>'>
          
            </div>

            <div class='mb-3'>
            <label for="">Price</label>
            <input type="text"  style='border:none;' name='price' class="form-control" value='<?php echo $fare ?>'>
          
            </div>