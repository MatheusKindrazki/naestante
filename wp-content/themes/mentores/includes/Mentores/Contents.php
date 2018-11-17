<?php

class MentoresContents
{

	/**
	* Método construtor - seta configuração básica da classe
	* Todos os actions/hooks do wordpress devem ficar aqui
	*/
	public function __construct()
	{
		add_action('init', array($this, 'hook_init'));
	}

	public function hook_init()
	{
		$this->post_type_banner();
		// $this->taxonomy_areas();
	}

	/**
	* Banner
	*/
	public function post_type_banner()
	{
		$labels = array(
			'name' => _x('Banners', 'post type general name', 'mentores'),
			'singular_name' => _x('Banner', 'post type singular name', 'mentores'),
			'add_new' => _x('Adicionar Novo', 'Banner', 'mentores'),
			'add_new_item' => __('Adicionar Novo Banner', 'mentores'),
			'edit_item' => __('Editar Banner', 'mentores'),
			'new_item' => __('Novo Banner', 'mentores'),
			'all_items' => __('Todos os Banners', 'mentores'),
			'view_item' => __('Ver Banner', 'mentores'),
			'search_items' => __('Procurar Banners', 'mentores'),
			'not_found' =>  __('Nenhum Banner encontrado', 'mentores'),
			'not_found_in_trash' => __('Nenhum Banner encontrado na Lixeira', 'mentores'),
			'parent_item_colon' => '',
			'menu_name' => __('Banner', 'mentores')
		);

		$config = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'menu_icon' => 'dashicons-slides',
			'exclude_from_search' => true,
			'supports' => array( 'title', 'thumbnail')
		);

		register_post_type('banners', $config);
	}

	/**
	* Áreas Cursos
	*/
	public function taxonomy_areas()
	{
		$labels = array(
			'name' => _x( 'Área do Evento', 'taxonomy general name' ),
			'singular_name' => _x( 'Área do Evento', 'taxonomy singular name' ),
			'search_items' =>  __( 'Buscar Área do Evento' ),
			'all_items' => __( 'Todas as Categorias de Evento' ),
			'parent_item' => __( 'Categoria Pai' ),
			'parent_item_colon' => __( 'Categoria Pai:' ),
			'edit_item' => __( 'Editar Área do Evento' ),
			'update_item' => __( 'Atualizar Área do Evento' ),
			'add_new_item' => __( 'Adicionar Nova Área do Evento' ),
			'new_item_name' => __( 'New Genre Name' ),
			'menu_name' => __( 'Área do Evento' ),
		);

		$config = array(
			'hierarchical' => true, //Use "true" para criar taxonomu no estilo categorias. "False", cria uma taxonomy no estilo de tags
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'areas' )
		);

		register_taxonomy('areas',array('cursos'), $config);
	}

}
