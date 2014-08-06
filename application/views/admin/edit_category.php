    <div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('admin/update_category',$attributes); 
	?>
    <fieldset>
    <div id="legend">
    <legend class=""><h2>แก้ไขชนิด</h2></legend></div>
    <table width="368" border="1">
  <tr>
    <td width="96" align="center">ชนิด</td>
    <td width="256" align="center">
      <label for="type"></label>
      <?php foreach ($category as $row): ?>
      <input name="category" type="text" id="category" value="<?php echo $row->category_name; ?>" />
      <input name="cid" type="hidden" id="cid" value="<?php echo $row->cid; ?>" />
      <?php endforeach; ?>
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
    



