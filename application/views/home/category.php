<div class="main">
	<h2>สั่งอาหาร</h2>
	<div class="main-left">
	<table width="100%" border="1">
			<tr>
                <td width="20%" align="center">ประเภท*</td>
                <td width="251" align="center">
                <select name="category" id="category">
                <option value="0" selected="selected">เลือกประเภทอาหาร</option>
                <?php foreach ($category as $row): ?>
                    <option value="<?php echo $row->cid; ?>"><?php echo $row->category_name; ?></option>
                <?php endforeach; ?>
              </select></td>
            </tr>
      </table>
	<p><h3>รายการเมนู</h3></p>
	<table width="100%" border="1" id="menu-panel">
		  <tr>
		    <td>เมนู</td>
		    <td>จำนวน</td>
		    <td>ราคา/ชิ้น</td>
		    <td>หมายเหตุ</td>
		    <td>&nbsp;</td>
	      </tr>
	  </table>
		<p>&nbsp;</p>
		<p>หมายเหตุ ต้องกรอกช่องที่มี * ให้ครบถึงจะเพิ่มเมนูได้</p>
  </div>

    <div class="main-right">
    	<h3>รายการที่สั่ง</h3>
    	<p>ป้ายคิว*
    	  <select name="queue" id="queue"><option value="0" selected="selected">เลือกป้ายคิว</option>
			  <?php
					foreach($queue as $row)
					{
						$nubmer=$row->queue;
					}
					for($i=1;$i<=$nubmer;$i++)
					{
						echo '<option value="'.$i.'">'.$i.'</option>';
		
					}
					?></select></p>
    	<table width="100%" border="1" id="order-panel">
    	  <tr>
    	    <td align="center">เมนู</td>
    	    <td align="center">จำนวน</td>
    	    <td align="center">ราคา</td>
            <td align="center"></td>
  	      </tr>
   	  </table>
   	  <p>&nbsp;</p>
   	  <p>จำนวนเงินสุทธิ <span class="total"></span> ฿</p>
    	<p>ส่วนลด 
    	  <select name="discount" class="discount">
    	    <option value="0" selected="selected">0</option>
    	    <option value="5">5</option>
    	    <option value="10">10</option>
    	    <option value="15">15</option>
    	    <option value="20">20</option>
  	    </select>
% </p>
    	<p>ยอดรวม <span class="totaldiscount"></span> ฿</p>
    	<p>รับเงิน <input type="text" name="cash" class="cash" /> ฿</p>
    	<p>ทอนเงิน <span class="cashback"></span> ฿</p>
    	<p>
    	  <button class="btn btn-success" id="save">บันทึกรายกาเมนู</button>
    	  &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success" id="paid">ชำระเงิน</button>
</p>
        
    </div>    

</div>
