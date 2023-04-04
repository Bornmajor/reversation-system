<div id="section1">


<div id='filter_trip'><!--filter_trip-->

<form id='form_search_bus' action="" method="post">
    
<!---fromm-->
   <div class='search_div'>
    <input type="text" name="from" id='text_input' Placeholder='From' list="list-from" class="form-control input-datalist" required>

    <datalist id="list-from">
    <?php displayBasedAreas(); ?>
    </datalist>
</div>
    <!---fromm-->

<div class='search_div'>
    <input type="text" name="to" id='text_input' Placeholder='To' list="list-to" class="form-control input-datalist" required>

    <datalist id="list-to">
        <?php displayBasedAreas(); ?>

        <!-- <option>Mombasa</option>
        <option>Nairobi</option> -->
        

    </datalist>
</div>


    <input type="date"  id="datepicker" name='date_trip' min="<?php echo date('Y-m-d'); ?>" required>
    <input type="submit" value="Search" class='btn btn-primary' name='submit'>
</form>

<div id="content"><!--content-->

   

</div><!--content-->


</div><!--filter_trip-->

<div id="bus_routes" class="card" style="width: 16rem;"><!--bus_routes-->

<div class="card-header">
Based areas
  </div>
  <ul class="list-group list-group-flush">
    <?php  getBasedAreas(); ?>

    <!-- <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li> -->
  </ul>


</div><!--bus_routes-->

</div>