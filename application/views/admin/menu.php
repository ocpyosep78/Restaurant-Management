<div class="main">
<p><a class="btn btn btn-info" href="<?php echo base_url("admin/category"); ?>" >ประเภทเมนู</a>
  <a class="btn btn btn-info" href="<?php echo base_url("admin/add_menu"); ?>" >เพิ่มเมนู</a> 
</p>
<h2>เมนู</h2>
  <table width="794" border="1">
    <tr>
    <td width="412" align="center">ชื่อ</td>
    <td width="108" align="center">ประเภท</td>
    <td width="115" align="center">ราคา/บาท</td>
    <td width="131" align="center">&nbsp;</td>
  </tr>
  <?php if($this->admin_model->count_menu()!=null) { ?>
  <?php foreach($menu as $row): ?>
  <tr>
    <td height="26" align="center"><?php echo $row->menu_name; ?> </td>
    <td align="center"><?php echo $row->category_name; ?></td>
    <td align="center"><?php echo $row->price; ?> </td>
    <td align="center"><a class="btn btn-warning" href="<?php echo base_url("admin/edit_menu").'/'.$row->mid; ?>" >แก้ไข</a> / <a class="btn btn-danger" href="<?php echo base_url("admin/delete_menu").'/'.$row->mid; ?>" >ลบ</a></td>
  </tr>
    <?php endforeach; } ?>
</table>
<p><?php echo $links; ?></p>
<p>&nbsp;</p>
</div>

