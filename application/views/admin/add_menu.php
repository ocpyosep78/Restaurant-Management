<div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('admin/add_menu',$attributes); 
	?>
    <fieldset>
    <div id="legend">
      <h2>เพิ่มเมนู</h2>
    </legend></div>
    <table width="385" border="1">
  <tr>
    <td width="118" align="center">ชื่อ</td>
    <td width="251" align="center">
      <label for="menu"></label>
      <input name="menu" type="text" id="menu" value="" />
      </td>
  </tr>
  <tr>
    <td align="center">ชนิด</td>
    <td align="center">
      <label for="type"></label>
      <?php foreach ($category_menu as $row): ?>
      <input id="category" name="category" type="radio" value="<?php echo $row->cid; ?>" />
      <?php echo $row->category_name; ?><br />
      <?php endforeach; ?></td>
  </tr>
  <tr>
    <td align="center">ราคา/บาท</td>
    <td align="center">
      <label for="price"></label>
      <input name="price" type="text" id="price" value="" />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="controls">
      <input type="submit" class="btn btn-success" name="submit" id="submit" value="เพิ่ม" />
    </span></td>
    </tr>
    </table>
<div class="controls"></div>
    </fieldset>
    </form>
    </div>
