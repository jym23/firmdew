<div class="fd-form">
	<div class="notification">
		<?php 
			if( $message['captcha'] ){
				?><p class="error">Cannot send request. Make sure you're not ROBOT.</p><?php
			}elseif( $message['email'] ){
				?><p class="error">Cannot send request. Please enter a valid Email Address.</p><?php
			}elseif( $message['success'] ){
				?><p class="success">Thank you! Request successfully sent.</p><?php
			}
		?>
	</div>
	<?php if( ! isset($message['success']) || $message['success'] === false ) : ?>
		<form action="" method="post" id="fd-contact-form">
			<div>
				<label class="hide-me">First Name: </label>
				<p><input type="text" class="form-input required" id="fname" name="fname" placeholder="First Name" value="<?php echo $fields['firstname']; ?>"></p>
			</div>
			<div>
				<label class="hide-me">Last Name: </label>
				<p><input type="text" class="form-input required" id="lname" name="lname" placeholder="Last Name" value="<?php echo $fields['lastname']; ?>"></p>
			</div>
			<div>
				<label class="hide-me">Email: </label>
				<p><input type="text" class="form-input email required" id="email" name="email" placeholder="Email" value="<?php echo $fields['email']; ?>"></p>
			</div>
			<div>
				<label class="hide-me">Message: </label>
				<p><textarea name="msg" id="msg" class="required" placeholder="Message"><?php echo $fields['message']; ?></textarea></p>
			</div>
			<div>
				<label class="hide-me">Captcha: </label>
				<p><img src="<?php echo home_url(); ?>/wp-captcha.php"></p>
				<p><input type="text" class="form-input required" name="user_code" id="user_code"></p>
			</div>
			<div>
				<label class="hide-me">Submit</label>
				<p><input type="submit" name="fd-submit-form" id="fd-submit-form" value="Submit"></p>
			</div>
		</form>
	<?php endif; ?>
	
	<?php
	if( !empty($headline) ):
		?>
		<div class="headline">
		<?php echo $headline; ?>
		</div>
		<?php
	endif;
	?>
	
</div>