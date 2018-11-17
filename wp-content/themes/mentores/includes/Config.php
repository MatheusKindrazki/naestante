<?php

class MentoresConfig
{

	public function __construct()
	{

		/**
		 * Remove barra de admin no front-end
		 */
		show_admin_bar(false);

		/**
		* Habilita recursos no tema
		*/
		add_theme_support('menus');
		add_theme_support('post-thumbnails');
		// add_action('after_setup_theme', 'woocommerce_support');
		add_theme_support('woocommerce');
		add_theme_support('sensei');

		/**
		 * Habilita recursos nos post types
		 */
		// add_post_type_support('page', 'excerpt');

		/**
		 * Adiciona estilo personalizado para o editor
		 */
		add_editor_style('css/tiny.css');

		/**
		 * Registra novos tamanhos de imagens
		 */
		add_image_size('list-image', 855, 300, true);



		/**
		 * Registra os Menus
		 */
		register_nav_menus(array(
			'primary' => 'Menu Principal',
			'footer' => 'Menu do Rodapé',
			'mobile' => 'Menu Mobile',
		));

		/**
		 * Registra todos os CSS e JS
		 */
		add_action('wp_enqueue_scripts', array('MentoresAssets', 'setCss'), 100);
		add_action('wp_enqueue_scripts', array('MentoresAssets', 'setJs'));

		/**
		 * Libera as requisições AJAX
		 */
		MentoresAjax::perm();

		/**
		 * Instancia nas Imagens Destacadas
		 */
		// if (class_exists('MultiPostThumbnails')) {
		// 	new MultiPostThumbnails(array(
		// 		'label' => 'Banner Superior',
		// 		'id' => 'banner-page',
		// 		'post_type' => 'page'
		// 	));
		// }

		/**
		 * Adiciona campos personalizados nas taxonomias
		 */
		/*
		$productTermMetas = new AbstractTaxonomyField('product_cat', array(
			array(
				'type'			=> 'text',
				'name'			=> 'catalogo-pdf',
				'title'			=> 'Catalogo PDF',
				'description'	=> 'Se existir um catalogo para está categoria, informe o endereço aqui.'
			),
		));
		*/

		/**
		 * Registra todos os metaboxes
		 */
		 /*
		$this->metaboxes = new MentoresMetabox(array(
			array(
				'id' => 'ambience-products',
				'title' => 'Produtos Relacionados',
				'post_type' => 'ambience'
			),
		));
		*/

	}

}
