    <div class="main">
      <h2>รายการบิล</h2>
      <table width="100%" border="1">
        <tr>
          <td width="126" align="center">ID</td>
          <td width="165" align="center">วันที่</td>
          <td width="179" align="center">ดูรายละเอียด</td>
        </tr>
        <tr>
        <?php foreach ($payment as $row): ?>
          <td align="center"><?php echo $row->pid; ?></td>
          <td align="center"><?php echo substr($row->date,0,10); ?></td>
          <td align="center"><a href="<?php echo site_url('admin/payment_list').'/'.$row->pid; ?>"  class="btn btn-success">ดูรายละเอียด</a>
<a href="<?php echo site_url('admin/payment_delete').'/'.$row->pid; ?>"  class="btn btn-danger">ลบ</a></td></tr>
        <?php endforeach; ?>
      </table>
<p>&nbsp;</p>

    </div>
