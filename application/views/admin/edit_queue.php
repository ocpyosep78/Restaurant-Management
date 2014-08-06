    <div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('admin/update_queue',$attributes); 
	?>
    <fieldset>
    <div id="legend">
      <h2>แก้ไขจำนวนลำดับป้ายคิว</h2>
    </legend></div>
    <table width="385" border="1">
  <tr>
    <td width="118" align="center">จำนวนป้ายลำดับคิว</td>
    <td width="251" align="center">
      <label for="queue"></label>
      <?php if($this->admin_model->count_queue()==0){ 
     	echo'<input name="queue" type="text" id="queue" value="0" />';
       } else { foreach ($queue as $row){
     	echo '<input name="queue" type="text" id="queue" value="'.$row->queue.'" />';
    } }?>
 </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="controls">
      <input type="submit" class="btn btn-success" name="submit" id="submit" value="แก้ไข" />
    </span></td>
    </tr>
    </table>
    </fieldset>
    </form>
    </div>
