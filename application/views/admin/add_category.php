    <div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('admin/add_type_menu',$attributes); 
	?>
    <fieldset>
    <div id="legend">
      <h2>เพิ่มชนิดเมนู</h2>
      </legend></div>
    <table width="321" border="1">
  <tr>
    <td width="65" align="center">ชนิด</td>
    <td width="240" align="center">
      <label for="type">
      <input type="type" name="type_menu" id="type_menu" /></label>
      </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="controls">
      <input type="submit" class="btn btn-success" name="submit" id="submit" value="เพิ่ม" />
      </span></td>
  </tr>
    </table>
    <br />
    </hr>
</fieldset></form>
  <h2>ชนิดเมนู</h2>

<table width="404" border="1">
      <tr>
        <td width="237" align="center">ชื่อชนิด</td>
        <td width="151" align="center">&nbsp;</td>
      </tr>
        <?php foreach ($type_menu as $row): ?>
      <tr>
        <td align="center"><?php echo $row->tm_menu; ?></td>
        <td align="center"><a class="btn btn-warning" href="<?php echo base_url("admin/edit_type_menu").'/'.$row->tm_id; ?>" >แก้ไข</a> / <a class="btn btn-danger" href="<?php echo base_url("admin/delete_type_menu").'/'.$row->tm_id;; ?>" >ลบ</a></td>
      </tr>
      <?php endforeach; ?>
    </table>
</div>
    



