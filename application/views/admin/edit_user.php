    <div class="main">
    <?php foreach($query as $row): ?>
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('admin/edit_user/'.$row->uid,$attributes); 
	?>
    <fieldset>
    <div id="legend">
    <legend class="">แก้ไขผู้ใช้</legend></div>
    
    <div class="control-group">
    <!-- Role -->
    <label class="control-label" for="role">Role</label>
:    
<div class="controls">
    	<select name="role" id="role">
    	<?php
    	foreach($role as $row2)
    	{
    		echo '<option value="'.$row2->rid.'">'.$row2->role_name.'</option>';
    	}
    	?>
    	</select>
    </div>

    <div class="control-group">
    <!-- Username -->
    <label class="control-label" for="role">Username</label>
:    
<div class="controls">
	<input type="text" id="username" name="username" placeholder="" class="input-xlarge" value="<?php echo $row->username; ?>">
	<?php echo form_error('username', '<div class="error">', '</div>'); ?>
    <input name="uid" type="hidden" value="<?php echo $row->uid; ?>" /></div>
    </div>
     
    <div class="control-group">
    <!-- E-mail -->
    <label class="control-label" for="email">E-mail</label>
:    
<div class="controls">
<input type="text" id="email" name="email" placeholder="" class="input-xlarge" value="<?php echo $row->email; ?>">
    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
    </div>
    </div>
         
    <div class="control-group">
    <!-- Firstname -->
    <label class="control-label" for="firstname">ชื่อ</label>
:    
<div class="controls">
	<input type="text" id="firstname" name="firstname" placeholder="" class="input-xlarge" value="<?php echo $row->firstname; ?>">
    <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>
    </div>
    </div>
    
    <div class="control-group">
    <!-- Lastname -->
    <label class="control-label" for="lastname">นามสกุล</label>
:    
<div class="controls">
	<input type="text" id="lastname" name="lastname" placeholder="" class="input-xlarge" value="<?php echo $row->lastname; ?>">
    <?php echo form_error('lastname', '<div class="error">', '</div>'); ?>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="password">รหัสผ่าน</label>
    <div class="controls">
    <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
    <?php echo form_error('password', '<div class="error">', '</div>'); ?></div>
    </div>
     
    <div class="control-group">
    <label class="control-label" for="password_confirm">รหัสผ่าน (ยืนยัน)</label>
    <div class="controls">
    <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
    <?php echo form_error('password_confirm', '<div class="error">', '</div>'); ?></div>
    </div>
     
    <div class="control-group">
    <label class="control-label" for="lastname">เบอร์โทร</label>
    <div class="controls">
    <input type="text" id="tel" name="tel" placeholder="" class="input-xlarge" value="<?php echo $row->tel ?>">
    <?php echo form_error('tel', '<div class="error">', '</div>'); ?></div>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="lastname">ที่อยู่</label>
    <div class="controls">
    <textarea  id="address" name="address" placeholder="" class="input-xlarge"><?php echo $row->address; ?></textarea>
    <?php echo form_error('address', '<div class="error">', '</div>'); ?></div>
    </div>
    
    <div class="control-group">
    <!-- Button -->
    <div class="controls">
    <input type="submit" class="btn btn-success" name="submit" id="submit" value="แก้ไข" />
    </div>
    </div>
    </fieldset>
    <?php endforeach; ?>
    </form>
    </div>
