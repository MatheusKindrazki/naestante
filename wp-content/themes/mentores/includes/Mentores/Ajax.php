<?php

class MentoresAjax
{

	public static function perm()
	{
		// Libera requisições AJAX no Admin com action para exampleMethod;
		add_action('wp_ajax_exampleMethod', array('MentoresAjax', 'exampleMethod'));
		// Libera requisições AJAX públicas com action para exampleMethod;
		add_action('wp_ajax_nopriv_exampleMethod', array('MentoresAjax', 'exampleMethod'));
	}

	public static function exampleMethod()
	{
		$data = $_REQUEST;
		$response = array();

		// Inserir sua lógica aqui
		// setar o retono para a variável $response

		echo json_encode($response);
		die;
	}

}
