<?php
include 'connection.php';
include 'functions.php';


?>
<div id='feedback'></div>
<form  id='form_trip' action="" method="post">

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Add bus</label>
<select name='plate_no' class="form-select" aria-label="Default select example" required>
  <option selected value=''>Choose bus</option>
  <?php getBuses(); ?>

</select>
</div>
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Add route</label>
<select name='route_id' class="form-select" aria-label="Default select example" required>
  <option selected value=''>Choose route</option>
  <?php getRoute(); ?>

</select>
</div>

<div class="mb-3">
    <label for="" class="form-label">Departure time</label>
    <input type="text" class="form-control" name='departure_time'  required>
    <label for="" class="form-label">Arrival time</label>
    <input type="text" class="form-control" name='arrival_time' required>
    <label for="" class="form-label">Trip date</label>
    <input type="date" class="form-control" name='date_trip' min="<?php echo date('Y-m-d'); ?>" required>
</div>   
<input type="submit" value="Create trip" class="btn btn-primary">




</form>
<script>
    $('#form_trip').submit(function(e){
        e.preventDefault();

        // $('#plate_no').val();
        // $('#route_id').val();
        // $('#departure_time').val();
        // $('#arrival_time').val();

        var postData = $(this).serialize();

        $.post("includes/add_trip.php",postData,function(data){
           
            $('#feedback').html(data);
            $("#form_trip")[0].reset();


        });
        
        

    });

</script>
