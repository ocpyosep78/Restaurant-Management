<div class="main">
<p><a class="btn btn btn-info" href="<?php echo base_url("admin/add_user"); ?>" >เพิ่มผู้ใช้</a></p>
<table width="100%" border="1">
  <tr>
    <td align="center">Username</td>
    <td align="center">ชื่อ</td>
    <td align="center">สกุล</td>
    <td align="center">E-mail</td>
    <td align="center">เบอร์โทร</td>
    <td align="center">ที่อยู่</td>
    <td align="center">ตำแหน่ง</td>
    <td align="center">&nbsp;</td>
  </tr>
  <?php foreach ($query as $row): ?>
  <tr>
    <td align="center"><?php echo $row->username; ?></td>
    <td align="center"><?php echo $row->firstname; ?></td>
    <td align="center"><?php echo $row->lastname; ?></td>
    <td align="center"><?php echo $row->email; ?></td>
    <td align="center"><?php echo $row->tel; ?></td>
    <td align="center"><?php echo $row->address; ?></td>
    <td align="center"><?php echo $row->role_name; ?></td>
    <td align="center"><a class="btn btn-warning" href="<?php echo base_url("admin/edit_user").'/'.$row->uid; ?>" >แก้ไข</a> / <a class="btn btn-danger" href="<?php echo base_url("admin/delete_user").'/'.$row->uid; ?>" >ลบ</a></td>
  </tr>
  <?php endforeach; ?>
</table>

</div>

