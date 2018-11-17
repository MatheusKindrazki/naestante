<!-- Body BG Config -->
<?php if(get_field('tipo_de_fundo_do_site', 'options')['value'] == 'Cor de Fundo'):
	if(get_field('cor_de_fundo', 'option')): ?>
		<style>
			body{
				background-color: <?php echo get_field('cor_de_fundo', 'options');?>
			}
		</style>
	<?php endif;
else: 
	if(get_field('tipo_de_imagem_de_fundo', 'options')['value'] == 'choose-01'): ?>
		<style>
			body {
				background-image: url('<?php echo get_field('imagem_padrao', 'options')['sizes']['large']; ?>');
				background-size: 190px;
			}
		</style>
	<?php 
	else: ?>
		<div class="ad-banner-theme" style="background-image: url('<?php echo get_field('imagem_banner_topo', 'options')['url']; ?>');"></div>
		<style>
			.ad-banner-theme {
				position: fixed;
				z-index: 5;
				top: 0px;
				right: 0;
				bottom: 0;
				left: 0;
				width: 100%;
				height: 1080px;
				background-repeat: no-repeat;
				background-position: center top;
			}
		</style>
	<?php endif;
endif; ?>

<!-- Body Font Config -->
<style>
	body {
		font-family: '<?php echo get_field('fonte_do_site', 'options'); ?>', sans-serif;
	}
</style>