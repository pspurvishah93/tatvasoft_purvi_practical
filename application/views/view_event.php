<h3>Event Title:<?php echo $event_title; ?></h3>
<table class="table">
  <thead>
    <tr>
      <th>Date</th>
      <th>Day Name</th>
    </tr>
  </thead>
  <tbody id="listdata">
    <?php if(!empty($range)) { foreach($range as $key => $value) { ?>
    <tr>
      <td><?php echo $value["dt"]; ?></td>
      <td><?php echo $value["dy"]; ?></td>
    </tr>
    <?php } } ?>
  </tbody>
</table>
<h3>Total Recurrence Event:<?php echo $total_count; ?></h3>
