<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Event Form</h4>

        <form class="forms-sample" id="add_event" name="add_event"  method="post">
          <div class="form-group">
            <label for="event_title">Event Title</label>
            <input type="text" class="form-control" id="event_title" name="event_title" placeholder="Event Title">
          </div>
          <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="text" class="form-control datepicker" id="start_date" name="start_date" placeholder="Start Date">
          </div>
          <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="text" class="form-control datepicker" id="end_date" name="end_date" placeholder="End Date">
          </div>
          <div class="form-group">
            <label for="event_recurrance_id">Recurrence</label>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="repeat_type" id="repeat_type1" value="1">
                      Repeat
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="form-control" id="repeat_at" name="repeat_at">
                      <option value="1">Every</option>
                      <option value="2">Every Other</option>
                      <option value="3">Every Third</option>
                      <option value="4">Every Fourth</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="form-control" id="repeat_day" name="repeat_day">
                      <option value="1">Day</option>
                      <option value="2">Week</option>
                      <option value="3">Month</option>
                      <option value="4">Year</option>
                    </select>
                  </div>
                </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="repeat_type" id="repeat_type2" value="2">
                      Repeat on the
                    </label>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control" id="repeat_on_at" name="repeat_on_at">
                      <option value="1">First</option>
                      <option value="2">Second</option>
                      <option value="3">Third</option>
                      <option value="4">Fourth</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control" id="repeat_on_day" name="repeat_on_day">
                      <option value="1">Sun</option>
                      <option value="2">Mon</option>
                      <option value="3">Tue</option>
                      <option value="4">Wed</option>
                      <option value="5">Thu</option>
                      <option value="6">Fri</option>
                      <option value="7">Sat</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2"> of the </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select class="form-control" id="repeat_on_type" name="repeat_on_type">
                      <option value="1">Month</option>
                      <option value="2">3 Month</option>
                      <option value="3">4 Month</option>
                      <option value="4">6 Month</option>
                      <option value="5">Year</option>
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

  $('#start_date,#end_date').datepicker('setDate', today);

    // $('#start_date').on('changeDate', function() {
    //   $('#end_date').datepicker('minDate', $('#start_date').val());
    //   // $('#end_date').datepicker('setDate', $('#start_date').getDate());
    // });

    $("#add_event").validate({
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

        var data1 = $("#add_event").serialize();

        $.ajax({
          url: '<?php echo base_url(); ?>event/add_event',
          type: "post",
          data: data1,
          "success": function(response) {
            if(response == '1'){
              alert("Event Added Successfully");
              window.location.reload();
            }
            else {
              alert("Event Not Added Successfully");
            }
          }
        });
      }
    });

});
</script>
