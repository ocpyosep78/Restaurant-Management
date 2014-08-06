    <div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('admin/update_menu',$attributes); 
	?>
    <fieldset>
    <div id="legend">
      <h2>แก้ไขเมนู</h2>
    </legend></div>
    <table width="385" border="1">
  <tr>
    <td width="118" align="center">ชื่อ</td>
    <td width="251" align="center">
      <?php foreach ($menu as $row): ?>
      <label for="menu"></label>
      <input name="menu" type="text" id="menu" value="<?php echo $row->menu_name; ?>" />
      </td>
  </tr>
  <tr>
    <td align="center">ชนิด</td>
    <td align="center">
      <label for="type"></label>
      <?php foreach ($menu_category as $row2): ?>
      <input id="type_menu" name="category" type="radio" <?php if($row->cid==$row2->cid 

){echo 'checked="checked"';}?> value="<?php echo $row2->cid; ?>" />
      <?php echo $row2->category_name; ?><br />
      <?php endforeach; ?></td>
  </tr>
  <tr>
    <td align="center">ราคา/บาท</td>
    <td align="center">
      <label for="price"></label>
      <input name="price" type="text" id="price" value="<?php echo $row->price; ?>" />
      <input name="id" type="hidden" value="<?php echo $row->mid; ?>" />
    </td>
  </tr>
  <?php endforeach; ?>
  <tr>
    <td colspan="2" align="center"><span class="controls">
      <input type="submit" class="btn btn-success" name="submit" id="submit" value="แก้ไข" />
    </span></td>
    </tr>
    </table>
<div class="controls"></div>
    </fieldset>
    </form>
    </div>
