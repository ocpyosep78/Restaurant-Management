<div class="main">
  <h2>จำนวนลำดับป้ายคิว</h2>
  <table width="559" border="1">
    <tr>
    <td width="412" align="center">จำนวนลำดับป้ายคิว</td>
    <td width="131" align="center">&nbsp;</td>
  </tr>
  <?php
  if($this->admin_model->count_queue()==null){ ?>
    <tr>
    <td height="26" align="center">
	0
    </td>
    <td align="center"><a class="btn btn-warning" href="<?php echo base_url("admin/edit_queue"); ?>" >เพิ่ม</a></td>
  </tr>
  
  <?php }else { foreach ($queue as $row): ?>
  <tr>
    <td height="26" align="center">
	<?php echo $row->queue; ?>
    </td>
    <td align="center"><a class="btn btn-warning" href="<?php echo base_url("admin/edit_queue"); ?>" >แก้ไข</a></td>
  </tr>
    <?php endforeach; }?>
</table>
<p>&nbsp;</p>
</div>

