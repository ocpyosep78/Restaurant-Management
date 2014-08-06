    <div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('admin/category',$attributes); 
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
      <input type="text" name="category" id="category" /></label>
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

<table width="100%" border="1">
      <tr>
        <td width="65%" align="center">ชื่อชนิด</td>
        <td width="35%" align="center">&nbsp;</td>
      </tr>
      	<?php if($this->admin_model->count_category()!=null){ ?>
        <?php foreach ($category as $row): ?>
      <tr>
        <td align="center"><?php echo $row->category_name; ?></td>
        <td align="center"><a class="btn btn-warning" href="<?php echo base_url("admin/edit_category").'/'.$row->cid; ?>" >แก้ไข</a> / <a class="btn btn-danger" href="<?php echo base_url("admin/delete_category").'/'.$row->cid; ?>" >ลบ</a></td>
      </tr>
      <?php endforeach; }?>
    </table>
    <p><?php echo $links; ?></p>

</div>
    



