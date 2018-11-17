<?php

/**
 * A idéia desta classe é apenas ela possuir configurações relacionadas ao Advanced Custom Fields.
 * Demais configurações do tema devem ser feitas em suas respectivas classes.
 */

class MentoresAcf
{
	public function __construct()
	{
		add_action('admin_menu',		array('MentoresAcf', 'createOptionsPage'));
		add_action('acf/init',			array('MentoresAcf', 'createBannersConfig'));
		add_action('acf/init',			array('MentoresAcf', 'createThemeConfig'));
	}

	// Criar páginas de opção para o Tema
	public static function createOptionsPage()
	{
		if( function_exists('acf_add_options_page') ) {

			// Página de Opções
			$parent = acf_add_options_page(array(
				'page_title' 	=> 'Opções',
				'menu_title' 	=> 'Opções',
				'menu_slug' 	=> 'options',
				'redirect'  => false,
				'position' => '2.3'
			));

			// Opções da Home
			acf_add_options_sub_page(array(
				'page_title' 	=> 'Home',
				'menu_title' 	=> 'Home',
				'parent_slug' 	=> $parent['menu_slug'],
			));

		}
	}

	// Configurações do Tema
	public static function createThemeConfig()
	{
		if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_5bb67694055c7',
			'title' => 'Configurações do Tema',
			'fields' => array(
				array(
					'key' => 'field_5bb676fb49f80',
					'label' => 'Informações do Blog',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5bb677c649f81',
					'label' => 'Logotipo',
					'name' => 'logotipo',
					'type' => 'image',
					'instructions' => 'Esta é a logo do seu site',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5bb677df49f82',
					'label' => 'Favicon',
					'name' => 'favicon',
					'type' => 'image',
					'instructions' => 'Este é o ícone que aparece na aba do navegador quando alguém acessa o seu site',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5bb67d79e0e25',
					'label' => 'Aparência',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5bb758d3e07ca',
					'label' => 'Tipo de Fundo do site',
					'name' => 'tipo_de_fundo_do_site',
					'type' => 'radio',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'Cor de Fundo' => 'Cor de Fundo',
						'Imagem de Fundo' => 'Imagem de Fundo',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'Cor de Fundo',
					'layout' => 'horizontal',
					'return_format' => 'array',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5bb75a3341eff',
					'label' => 'Cor de Fundo',
					'name' => 'cor_de_fundo',
					'type' => 'color_picker',
					'instructions' => 'Cor sólida para o fundo do site',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb758d3e07ca',
								'operator' => '==',
								'value' => 'Cor de Fundo',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#FFF',
				),
				array(
					'key' => 'field_5bb7612bf69d2',
					'label' => 'Tipo de Imagem de Fundo',
					'name' => 'tipo_de_imagem_de_fundo',
					'type' => 'radio',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb758d3e07ca',
								'operator' => '==',
								'value' => 'Imagem de Fundo',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'choose-01' => 'Padrão para a página inteira',
						'choose-02' => 'Banner alinhado ao topo',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'default_value' => 'Padrão para a página inteira',
					'layout' => 'horizontal',
					'return_format' => 'array',
					'save_other_choice' => 0,
				),
				array(
					'key' => 'field_5bb764b276b22',
					'label' => 'Imagem Padrão',
					'name' => 'imagem_padrao',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7612bf69d2',
								'operator' => '==',
								'value' => 'choose-01',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5bb768db549b1',
					'label' => 'Imagem Banner Topo',
					'name' => 'imagem_banner_topo',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7612bf69d2',
								'operator' => '==',
								'value' => 'choose-02',
							),
						),
					),
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5bbcebe0cf394',
					'label' => 'Redes Sociais',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_5bbcec6ccf395',
					'label' => 'Redes Social',
					'name' => 'redes_social',
					'type' => 'repeater',
					'instructions' => 'Aqui você pode cadastrar as redes sociais do seu site, caso necessite de uma que não está listada aqui, contate a Mentores.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 7,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5bbcecd8cf396',
							'label' => 'Qual Rede?',
							'name' => 'qual_rede',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '30',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'facebook-f' => 'Facebook',
								'instagram' => 'Instagram',
								'linkedin-in' => 'Linkedin',
								'youtube' => 'YouTube',
								'google-plus-g' => 'Google Plus',
								'twitter' => 'Twitter',
								'pinterest-p' => 'Pinterest',
							),
							'default_value' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'return_format' => 'value',
							'ajax' => 0,
							'placeholder' => '',
						),
						array(
							'key' => 'field_5bbcedd7b1dbe',
							'label' => 'URL',
							'name' => 'url',
							'type' => 'url',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '70',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'options',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

		endif;
	}

	// Configuração para Banners
	public static function createBannersConfig()
	{
		if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_5bb7a68d2857f',
			'title' => 'Banner',
			'fields' => array(
				array(
					'key' => 'field_5bb7a6bc1d6da',
					'label' => 'Desktop',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'As configurações abaixo são referentes ao banner na versão desktop',
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),

				array(
					'key' => 'field_5bb7adcec6a65',
					'label' => 'Imagem do Banner',
					'name' => 'imagem_do_banner',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5bb7a95b59e7c',
					'label' => 'Título do Banner',
					'name' => 'titulo_do_banner',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bb7a95b59e32c',
					'label' => 'Texto do Banner',
					'name' => 'texto_do_banner',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bb7a9c14ed6a',
					'label' => 'Alinhamento',
					'name' => 'alinhamento_do_titulo',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'left' => 'Esquerda',
						'center' => 'Centralizado',
						'right' => 'Direita',
					),
					'default_value' => array(
						0 => 'Esquerda',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bb7ab253fdf7',
					'label' => 'Cor do Titulo',
					'name' => 'cor_do_texto',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'black' => 'Preto',
						'white' => 'Branco',
						'yellow' => 'Amarelo',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bb7acc52cb2f',
					'label' => 'Texto Botão',
					'name' => 'texto_botao',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5bb7ad0d2cb30',
					'label' => 'URL do Botão',
					'name' => 'url_do_botao',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '33',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5bb7c23cc5dfd',
					'label' => 'Mobile',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'As configurações abaixo são referentes ao banner na versão mobile',
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),
				array(
					'key' => 'field_5bb7c25ac5dfe',
					'label' => 'Imagem do Banner Mobile',
					'name' => 'imagem_do_banner_mobile',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5bb7a8481d6db',
								'operator' => '==',
								'value' => 'Imagem',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'banners',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array(
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'page_attributes',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
			'active' => 1,
			'description' => '',
		));
		endif;
	}

}