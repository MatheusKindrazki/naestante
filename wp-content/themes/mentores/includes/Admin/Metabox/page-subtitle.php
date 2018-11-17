<?php
global $post;
$subtitle = get_post_meta($post->ID, 'subtitle', true);
?>
<style media="screen">
	.full { display: block; width: 100%; padding: 5px 15px; font-size: 1.4em; }
</style>
<input type="text" class="full" name="meta[subtitle]" value="<?php echo $subtitle ?>">
