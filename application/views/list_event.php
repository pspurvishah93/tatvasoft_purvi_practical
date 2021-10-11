<style>
li {
    list-style: none;
    float: left;
    margin-right: 10px;
}
</style>
<table class="table">
  <thead>
    <tr>
      <th>Event Title</th>
      <th>Dates</th>
      <th>Occurrence</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="listdata">
    <?php if(!empty($list)) { foreach($list as $key => $value) { ?>
    <tr>
      <td><?php echo $value["event_title"]; ?></td>
      <td><?php echo $value["start_date"] . ' to ' . $value["end_date"]; ?></td>
      <td><?php echo $value["recurrance"]; ?></td>
      <td><a href="<?php echo base_url(); ?>event/view_event/<?php echo $value["event_id"]; ?>" class="btn btn-info btn-rounded btn-fw view_list">View</a> &nbsp; <a href="<?php echo base_url(); ?>event/edit_event/<?php echo $value["event_id"]; ?>" class="btn btn-warning btn-rounded btn-fw edit_event">Edit</a> &nbsp; <button data-eid="<?php echo $value["event_id"]; ?>" type="button" class="btn btn-danger btn-rounded btn-fw delete_list">Delete</button></td>
    </tr>
    <?php } } ?>
  </tbody>
</table>

<div id="pagination">
  <?php if(!empty($pagination)) {
    echo $pagination;
   } ?>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $(".delete_list").on('click', function(){
      var eventid = $(this).data('eid');
        $.ajax({
          url: '<?php echo base_url(); ?>event/delete_event',
          type: "post",
          data: 'event_id='+eventid,
          success: function(response) {
            var res = $.parseJSON(response);
            if(res[0] == '1'){
              alert("Deleted Successfully");
              $("#listdata").html(res[1]);
              $("#pagination").html(res[2]);
            }
            else {
              alert("Not Deleted Successfully");
            }
          }
        });
    });

    $(document).on('click', ".paglink", function(){
      var eventid = $(this).data('eid');
        $.ajax({
          url: '<?php echo base_url(); ?>event/view_nextevent',
          type: "post",
          data: 'offset='+eventid,
          success: function(response) {
            var res = $.parseJSON(response);
            if(res[0] == '1'){
              $("#listdata").html(res[1]);
              $("#pagination").html(res[2]);
            }
            else {
              alert("Not Deleted Successfully");
            }
          }
        });
    });
});
</script>
