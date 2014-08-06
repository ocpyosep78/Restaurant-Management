<select name="menu" id="menu" class="form-control">
	<?php foreach ($menu as $row): ?>		
    <option value="<?php echo $row->mid; ?>"><?php echo $row->menu_name; ?></option>
    <?php endforeach; ?>
</select>


