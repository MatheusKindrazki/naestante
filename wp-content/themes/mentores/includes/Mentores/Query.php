<?php

/**
 * - COMO USAR
 *
 * $banners = MNTR()->query->banners();
 * while($banners->have_posts()) : $banners->the_post();
 * 		// seu escopo
 * endwhile;
 * MNTR()->query->reset();
 *
 */

class MentoresQuery
{
	private $wpdb;

	/**
	* Método construtor - seta configuração básica da classe
	* Todos os actions/hooks do wordpress devem ficar aqui
	*/
	public function __construct()
	{
		global $wpdb;
		$this->wpdb = &$wpdb;

		// add_filter('pre_get_posts', array($this, 'filterRewriteQuery'));
	}

	public function reset()
	{
		wp_reset_query();
		wp_reset_postdata();
	}

	//Banners
	public function banners()
	{
		$banners = new WP_Query(array(
			'post_type' 		=> 'banners',
			'orderby' 			=> 'menu_order',
		));
		return $banners;
	}

}
