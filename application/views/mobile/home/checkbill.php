<div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('home/paid',$attributes); 
	?>
      <h2>ดูบิล</h2>
      <p>ป้ายคิวที่
        <?php echo $this->input->post('queue'); ?>
        <input name="queue" type="hidden" id="queue" value="<?php echo $this->input->post('queue'); ?>" />
      </p>
    <table width="100%" border="1">

  <tr>
    <td width="35%" align="center">รายการ</td>
    <td width="35%" align="center">จำนวน</td>
    <td align="center">ราคา</td>
    </tr>
  <tr>
  <?php foreach ($checkbill as $row): ?>
    <td align="center"><?php echo $row->menu_name; ?></td>
    <td align="center"><?php echo $row->number; ?></td>
    <td align="center"><?php echo $row->price; ?> ฿</td>
    
  </tr>
  <?php endforeach; ?>
  <tr>
    <td colspan="2" align="center">รวม
	</td>
    <td align="center">
	<?php
	$total=0;
	foreach($checkbill as $row)
	{
	$price=$row->price;
	$number=$row->number;
	$unit=$price*$number;
	$total+=$unit;
	}
		echo $total;
	?>
    <input name="total" type="hidden" id="total" value="<?php echo $total; ?>" />
    ฿</td>
  </tr>
  <tr>
    <td colspan="2" align="center">ลด</td>
    <td align="center">
      <select name="bill-discount" id="bill-discount">
        <option value="0">0%</option>
        <option value="5">5%</option>
        <option value="10">10%</option>
        <option value="15">15%</option>
        <option value="20">20%</option>
      </select>
	</td>
  </tr>
  <tr>
    <td colspan="2" align="center">ยอดรวม</td>
    <td align="center">
      <span id="bill-totaldiscount"><?php echo $total; ?></span> ฿
      <input name="bill-totaldiscount" type="hidden" id="bill-totaldiscount"/></td>
  </tr>
   <tr>
    <td colspan="2" align="center">รับเงินมา</td>
    <td align="center">
        <input type="text" name="bill-cash" id="bill-cash" /> 
        ฿</td>
  </tr>
    <tr>
    <td colspan="2" align="center">เงินทอน</td>
    <td align="center">
      <span id="bill-cashback"></span> ฿
      <input name="bill-cashback" type="hidden" id="bill-cashback" /></td>
  </tr>
  <tr>
      <td colspan="3" align="center"><span class="controls">
        <input name="submit" type="submit" class="btn btn-success" id="submit" value="เช็คบิล" />
        </span></td>
    </tr>
  </table>
    </form>
</div>
