<div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('home/checkbill',$attributes); 
	?>
    <fieldset>
    <div id="legend">
      <h2>ดูบิล</h2>
    </legend></div>
    <?php 
	if($this->session->flashdata('error')==true)
	{
		echo '<p class="error">ยังมีเมนูที่ยังทำไม่เสร็จ เหลืออยู่ในระบบ<p>';
	}
	?>
    <table width="385" border="1">
  <tr>
    <td width="118" align="center">ป้ายคิว</td>
    <td width="251" align="center">
      <label for="queue"></label>
      	  <select name="queue" id="queue">
      	    <option value="0">เลือกป้ายคิว</option>
      	    <?php
			foreach($queue as $row)
			{
           		$nubmer=$row->queue;
				echo '<option value="'.$nubmer.'">'.$nubmer.'</option>';
			}
				
			?>
   	      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="controls">
      <input type="submit" class="btn btn-success" name="submit" id="submit" value="ต่อไป" />
      </span></td>
  </tr>
    </table>
    </fieldset>
    </form>
    </div>