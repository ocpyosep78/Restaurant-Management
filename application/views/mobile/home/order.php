    <div class="main">
      <h2>รายการสั่งอาหาร</h2>
      <table width="100%" border="1">
        <tr>
          <td align="center">ป้ายคิว</td>
          <td align="center">ชื่อ</td>
          <td align="center">จำนวน</td>
          <td align="center">หมายเหตุ</td>
          <td align="center">สถานะการทำ</td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
        <?php foreach ($order as $row): ?>
          <td align="center"><?php echo $row->queue; ?></td>
          <td align="center"><?php echo $row->menu_name; ?></td>
          <td align="center"><?php echo $row->number; ?></td>
          <td align="center"><?php echo $row->note; ?></td>
          <td align="center"><?php if($row->status==0){?>
         	<a href="<?php echo site_url('home/order_update').'/'.$row->id; ?>" class="btn btn-warning"/>รอคิว</a>
         <?php }else{ ?>
         	<button class="btn btn-success">ทำเรียบร้อยแล้ว</button>
         <?php } ?>
         </td>
          <td align="center"><a href="<?php echo site_url('home/order_delete').'/'.$row->id; ?>" class="btn btn-danger"/>ลบ</a>
</td>
        </tr>
        <?php endforeach; ?>
      </table>
      <p>&nbsp;</p>

    </div>
