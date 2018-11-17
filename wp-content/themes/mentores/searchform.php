<?php
/**
 * Template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="text" class="field form-control" name="s" id="s" placeholder="<?php _e( 'Pesquisar', 'mentores' ); ?>" />
		<div class="input-group-append">
			<input type="submit" class="btn bg-primary text-white" name="submit" id="searchsubmit" value="<?php _e( 'Pesquisar', 'mentores' ); ?>" />
		</div>
	</div>
</form>