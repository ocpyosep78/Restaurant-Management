<h2>สั่งอาหาร</h2>
<table width="100%" border="1">
<tr>
    <td width="118" align="center">ป้ายคิว</td>
    <td width="251" align="center">
      <label for="queue"></label>
      	  <select name="queue" id="queue"  class="form-control">
      	    <option value="0" selected="selected">เลือกป้ายคิว</option>
      	    <?php
			foreach($queue as $row)
			{
           		$nubmer=$row->queue;
			}
			for($i=1;$i<=$nubmer;$i++)
			{
				echo '<option value="'.$i.'">'.$i.'</option>';

			}
			?>
   	      </select>
    </td>
  </tr>
  <tr>
    <td align="center">ประเภท</td>
    <td align="center">
	<select name="category" id="category"  class="form-control">
	<option value="0" selected="selected">เลือกประเภท</option>
	<?php foreach ($category as $row): ?>
		<option value="<?php echo $row->cid; ?>"><?php echo $row->category_name; ?></option>
    <?php endforeach; ?>
    </select>
</td>
    </tr>
      <tr>
    <td width="118" align="center">ชื่อ</td>
    <td width="251" align="center">
      <select name="menu" id="menu"  class="form-control">
      <option value="0" selected="selected">เลือกเมนู</option>
	<?php foreach ($menu as $row): ?>		
    <option value="<?php echo $row->mid; ?>"><?php echo $row->menu_name; ?></option>
    <?php endforeach; ?>
      	  </select>
    </td>
  </tr>
  <tr>
    <td align="center">จำนวน</td>
    <td align="center"><select name="number" id="number" class="form-control">
      <option value="1" selected="selected">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>
    </tr>
  <tr>
    <td align="center">หมายเหตุ</td>
    <td align="center"><input type="text" name="note" id="note" class="form-control"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="controls">
      <input type="submit" class="btn btn-success" name="submit" id="submit-menu" value="บันทึก" />
    </span></td>
  </tr>
    </table>

</div>  
</body>
</html>
