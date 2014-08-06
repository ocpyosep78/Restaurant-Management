<table border="1" width="100%" id="workplace-table">
	<tr id="header-menu" align="center">
		<td>เมนู</td>
		<td>จำนวน</td>
		<td>ราคา/ชิ้น</td>
		<td>หมายเหตุ</td>
		<td>&nbsp;</td>
	</tr>
	<?php foreach($menu as $row):?>
    <tr align="center">
        <td>
        <?php echo $row->menu_name; ?>
        <input name="mid" id="mid" type="hidden" value="<?php echo $row->mid; ?>" />
        <input name="menu-name" id="menu-name" type="hidden" value="<?php echo $row->menu_name; ?>" />
    </td>
        <td>
          <select name="number" id="number">
            <?php 
            for($i=1;$i<=10;$i++)
            {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
          </select>
        </td>
        <td><?php echo $row->price; ?><input name="price" id="price" type="hidden" value="<?php echo $row->price; ?>" />
        ฿</td>
        <td><input name="note" type="text" class="form-control" id="note"/></td>
        <td align="center"><button class="btn btn-primary" id="add-menu">เพิ่มเมนู</button></td>
    </tr>
    <?php endforeach; ?>
</table>
