<?php if ( ! $this->api_key ) : // no api key, provide a button to get one ?>

	<div class="protect-status attn">
		<?php if( ! empty( $this->api_key_error ) ) : ?>
			<p class="error"><?php echo $this->api_key_error; ?></p>
			<p>
				<a href="?page=jetpack-debugger"><?php echo __( 'Debug Jetpack for more information.', 'jetpack' ); ?></a>
			</p>
		<?php endif; ?>

		<form method="post">
			<?php wp_nonce_field( 'jetpack-protect' ); ?>
			<input type='hidden' name='action' value='get_protect_key' />
			<p class="submit">
				<?php _e( 'An API key is needed for Jetpack Protect.', 'jetpack' ); ?>
				<br /><br /><input type='submit' class='button-primary' value='<?php echo esc_attr( __( 'Get an API Key', 'jetpack' ) ); ?>' />
			</p>
		</form>
	</div>

<?php else : // api key is good, show white list options ?>

	<?php
	global $current_user;
	$whitelist = jetpack_protect_format_whitelist( $this->whitelist ); // todo remove 'local' from schema when we merge next iteration on calypso
	?>
	<div class="protect-whitelist">

		<form id="editable-whitelist" method="post">
			<h3><?php _e( 'Whitelist Management', 'jetpack' ); ?></h3>

			<?php if( ! empty( $this->whitelist_error ) ) : ?>
				<p class="error"><?php  _e('One of your IP addresses was not valid.', 'jetpack'); ?></p>
			<?php endif; ?>

			<?php if( $this->whitelist_saved === true ) : ?>
				<p class="success"><?php  _e('Whitelist saved.', 'jetpack'); ?></p>
			<?php endif; ?>

			<p>
				<?php _e( 'Whitelisting an IP address prevents it from ever being blocked by Jetpack.', 'jetpack' ); ?><br />
				<strong><?php printf( __( 'Your current IP: %s', 'jetpack' ), $this->user_ip ); ?></strong>
			</p>
			<?php wp_nonce_field( 'jetpack-protect' ); ?>
			<input type='hidden' name='action' value='jetpack_protect_save_whitelist' />
			<textarea name="whitelist"><?php echo implode( PHP_EOL, $whitelist['local'] ); ?></textarea>
			<p>
				<em><?php _e('IPv4 and IPv6 are acceptable. <br />To specify a range, enter the low value and high value separated by a dash. Example: 12.12.12.1-12.12.12.100', 'jetpack' ); ?></em>
			</p>
			<p>
				<input type='submit' class='button-primary' value='<?php echo esc_attr( __( 'Save', 'jetpack' ) ); ?>' />
			</p>
		</form>

	</div>

<?php endif; ?>
