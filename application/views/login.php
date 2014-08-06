<div class="main">
    <?php 
	$attributes = array('class' => 'form-horizontal');
	echo form_open('home/check_login',$attributes); 
	?>
    <fieldset>
    <div id="legend">
    <legend class="">Login</legend>
    </div>
    <div class="control-group">
    <!-- Username -->
    <label class="control-label" for="username">Username</label>
    <div class="controls">
    <input type="text" id="username" name="username" placeholder="" class="form-control">
    </div>
    </div>
     
    <div class="control-group">
    <!-- Password-->
    <label class="control-label" for="password">Password</label>
    <div class="controls">
    <input type="password" id="password" name="password" placeholder="" class="form-control">
    </div>
    </div>
     
     
    <div class="control-group">
    <!-- Button -->
    <div class="controls">
    <button class="btn btn-success">Login</button>
    </div>
    </div>
    </fieldset>
    </form>
</div>
