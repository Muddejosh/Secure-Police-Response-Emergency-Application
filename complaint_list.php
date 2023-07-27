<?php 
include 'admin/db_connect.php'; 
?>

<div class="container">
    <div class="col-lg-12 fr-wrapper" id="">
      <table class="table table-bordered table-hover" id="complaint-tbl">
        <thead>
          <tr>
            <th width="20%">Date</th>
            <th width="30%">Report</th>
            <th width="30%">Incident Address</th>
            <th width="10%">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $status = array("","Pending","Received","Action Made");
          $qry = $conn->query("SELECT * FROM complaints where complainant_id = {$_SESSION['login_id']} order by unix_timestamp(date_created) desc ");
          while($row = $qry->fetch_array()):
          ?>
          <tr>
            <td><?php echo date('M d, Y h:i A',strtotime($row['date_created'])) ?></td>
            <td><?php echo $row['message'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $status[$row['status']] ?></td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    </div>
</div>
       
<script>
    $('#complaint-tbl').dataTable();
</script>