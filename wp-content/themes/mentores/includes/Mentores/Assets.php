<?php

class MentoresAssets
{

	public static $assetDir 				= '/assets';


	public static function suffix()
	{
		return defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
	}

	public static function parentDir()
	{
		return get_template_directory_uri();
	}

	public static function js() {
		return get_stylesheet_directory_uri(). self::$assetDir .'/js';
	}

	public static function css()
	{
		return get_stylesheet_directory_uri(). self::$assetDir .'/css';
	}

	/**
	* Funcão para carregar os scripts necessários para o template
	*
	*/
	public static function setJs()
	{
		wp_register_script('functions', self::js() . '/functions.js', array('jquery'), '1.0', true);

		//wp_enqueue_script('functions');

		wp_localize_script('functions', 'wp', array(
			'ajax'				=> admin_url('admin-ajax.php'),
			'api'				=> home_url('wp-json/')
		));
	}

	/**
	* Define as folhas de estilo a serem carregadas
	*
	*/
	public static function setCss()
	{
		//wp_enqueue_style('default', self::css() . '/style.css');
	}

	public static function getAsset($url)
	{
		return get_bloginfo('stylesheet_directory').self::$assetDir.'/'.$url;
	}

}

function get_asset($url) {
	return MentoresAssets::getAsset($url);
}
function asset($url) {
	echo get_asset($url);
}
