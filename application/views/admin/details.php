    <div class="main">
    <div id="legend">
      <h2>Payment ID
	<?php foreach ($details as $row): ?>
	<?php 
		$pid=$row['pid'];
		$date=$row['date']; 
		$firstname=$row['firstname']; 
		$lastname=$row['lastname']; 
		$queue=$row['queue'];
	?>
	<?php endforeach; ?>
    <?php echo '#'.$pid; ?>
    </h2>
      <p><h4>วัน/เดือน/ปี  <?php echo $date; ?></h4></p>
      <p>บันทึกโดย <?php echo $firstname; ?> - <?php echo $lastname; ?> </p>
      </p>
      <p>ป้ายลำดับที่ <?php echo $queue; ?> </p>
    </div>
    <table width="656" border="1">
  <tr>
    <td width="315" align="center">รายการ</td>
    <td width="148" align="center">จำนวน</td>
    <td width="171" align="center">ราคา</td>
  </tr>
  <tr>
  <?php foreach ($details as $row): ?>
	  <?php
		$id=$row['pid'];
		$menu=$row['menu_name']; 
		$number=$row['number']; 
		$price=$row['price']; 
		$total=$row['total'];
		$discount=$row['discount'];
		$total_discount=$row['total_discount'];
		$cash=$row['cash']; 
		$cashback=$row['cashback'];  
	?>
    <td align="center"><?php echo $menu; ?></td>
    <td align="center"><?php echo $number; ?></td>
    <td align="center"><?php echo $price; ?> ฿</td>
    
  </tr>
  <?php endforeach; ?>
  <tr>
    <td colspan="2" align="center">รวม
	</td>
    <td align="center">
	<?php
		echo $total;
	?>	 ฿</td>
  </tr>
  <tr>
    <td colspan="2" align="center">ลด</td>
    <td align="center">
      <label for="textfield"></label>
      <label for="discount"></label>
      <?php
		echo $discount.'%';
	?></td>
  </tr>
  <tr>
    <td colspan="2" align="center">รวมราคาหลังหักส่วนลด</td>
    <td align="center">
	<?php
		echo $total_discount;
	?>	 ฿</td>
  </tr>
    <tr>
    <td colspan="2" align="center">รับเงินมา</td>
    <td align="center">
	<?php
		echo $cash;
	?>	 ฿</td>
  </tr>
    <tr>
    <td colspan="2" align="center">เงินทอน</td>
    <td align="center">
	<?php
		echo $cashback;
	?> ฿</td>
  </tr>
    </table>

    </div>
