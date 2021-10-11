<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Event Form</h4>

        <form class="forms-sample" id="edit_event" name="edit_event"  method="post">
          <div class="form-group">
            <label for="event_title">Event Title</label>
            <input type="text" class="form-control" id="event_title" name="event_title" placeholder="Event Title" value="<?php echo $event_title; ?>">
            <input type="hidden" id="event_id" name="event_id" value="<?php echo $event_id; ?>">
          </div>
          <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="text" class="form-control datepicker" id="start_date" name="start_date" placeholder="Start Date" value="<?php echo date('d-m-Y', strtotime($start_date)); ?>">
          </div>
          <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="text" class="form-control datepicker" id="end_date" name="end_date" placeholder="End Date" value="<?php echo date('d-m-Y', strtotime($end_date)); ?>">
          </div>
          <div class="form-group">
            <label for="event_recurrance_id">Recurrence</label>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="repeat_type" id="repeat_type1" value="1" <?php if($repeat_type == 1) { ?> checked <?php } ?>>
                      Repeat
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="form-control" id="repeat_at" name="repeat_at">
                      <option value="1" <?php if($repeat_at == 1) { ?> selected <?php } ?>>Every</option>
                      <option value="2" <?php if($repeat_at == 2) { ?> selected <?php } ?>>Every Other</option>
                      <option value="3" <?php if($repeat_at == 3) { ?> selected <?php } ?>>Every Third</option>
                      <option value="4" <?php if($repeat_at == 4) { ?> selected <?php } ?>>Every Fourth</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="form-control" id="repeat_day" name="repeat_day">
                      <option value="1" <?php if($repeat_day == 1) { ?> selected <?php } ?>>Day</option>
                      <option value="2" <?php if($repeat_day == 2) { ?> selected <?php } ?>>Week</option>
                      <option value="3" <?php if($repeat_day == 3) { ?> selected <?php } ?>>Month</option>
                      <option value="4" <?php if($repeat_day == 4) { ?> selected <?php } ?>>Year</option>
                    </select>
                  </div>
                </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="repeat_type" id="repeat_type2" value="2" <?php if($repeat_type == 2) { ?> checked <?php } ?>>
                      Repeat on the
                    </label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control" id="repeat_on_at" name="repeat_on_at">
                      <option value="1" <?php if($repeat_on_at == 1) { ?> selected <?php } ?>>First</option>
                      <option value="2" <?php if($repeat_on_at == 2) { ?> selected <?php } ?>>Second</option>
                      <option value="3" <?php if($repeat_on_at == 3) { ?> selected <?php } ?>>Third</option>
                      <option value="4" <?php if($repeat_on_at == 4) { ?> selected <?php } ?>>Fourth</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control" id="repeat_on_day" name="repeat_on_day">
                      <option value="1" <?php if($repeat_on_day == 1) { ?> selected <?php } ?>>Sun</option>
                      <option value="2" <?php if($repeat_on_day == 2) { ?> selected <?php } ?>>Mon</option>
                      <option value="3" <?php if($repeat_on_day == 3) { ?> selected <?php } ?>>Tue</option>
                      <option value="4" <?php if($repeat_on_day == 4) { ?> selected <?php } ?>>Wed</option>
                      <option value="5" <?php if($repeat_on_day == 5) { ?> selected <?php } ?>>Thu</option>
                      <option value="6" <?php if($repeat_on_day == 6) { ?> selected <?php } ?>>Fri</option>
                      <option value="7" <?php if($repeat_on_day == 7) { ?> selected <?php } ?>>Sat</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2"> of the </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control" id="repeat_on_type" name="repeat_on_type">
                      <option value="1" <?php if($repeat_on_type == 1) { ?> selected <?php } ?>>Month</option>
                      <option value="2" <?php if($repeat_on_type == 2) { ?> selected <?php } ?>>3 Month</option>
                      <option value="3" <?php if($repeat_on_type == 3) { ?> selected <?php } ?>>4 Month</option>
                      <option value="4" <?php if($repeat_on_type == 4) { ?> selected <?php } ?>>6 Month</option>
                      <option value="5" <?php if($repeat_on_type == 5) { ?> selected <?php } ?>>Year</option>
                    </select>
                  </div>
                </div>
            </div>
          </div>

          <button type="sumit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  var date = new Date();
  var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
  var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

  $('#start_date').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    todayHighlight: true,
    startDate: today
  });

  $('#end_date').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true,
    autoclose: true,
    startDate: today
  });

    $("#edit_event").validate({
      rules: {
        event_title: "required",
        start_date: "required",
        end_date:  "required",
      },
      messages : {
        event_title: "Please enter event title",
        start_date: "Please select start date",
        end_date: "Please select end date"
      },
      submitHandler: function(form){
        // var startdata = new Date($("#start_date").val());
        // var enddate = new Date($("#end_date").val());
        //
        // if(enddate < startdata) {
        //   alert(1);
        // }

        if(!$('input[name=repeat_type]').is(":checked")) {
          alert("Please select any on Recurrence");
        }

        var data1 = $("#edit_event").serialize();

        $.ajax({
          url: '<?php echo base_url(); ?>event/update_event',
          type: "post",
          data: data1,
          "success": function(response) {
            if(response == '1'){
              alert("Event Updated Successfully");
              window.location.reload();
            }
            else {
              alert("Event Not Updated Successfully");
            }
          }
        });
      }
    });

});
</script>
