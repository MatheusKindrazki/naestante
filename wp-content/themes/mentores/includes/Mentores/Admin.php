<?php

class MentoresAdmin
{

	private $optionsList = array();

	/**
	* Método construtor - seta configuração básica da classe
	* Todos os actions/hooks do wordpress devem ficar aqui
	*/
	public function __construct()
	{
		add_action('admin_head',				array($this, 'head'));
		add_action('login_head',				array($this, 'loginHead'));
		add_action('admin_enqueue_scripts',		array($this, 'setJs'));
		//add_action('admin_footer',			array($this, 'footer'));
		//add_action('admin_menu',				array($this, 'registerPages'));


		$this->options_list = array();
	}

	public function setJs($hook)
	{
	}
	/**
	* Ações para o hook admin_head
	*
	*/
	public function head()
	{
		echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/assets/css/wp-admin.css' . '">';
	}

	/**
	* insere texto no rodapé da interface
	*/
	public function footer()
	{
		echo '<a id="logo-mentores" title="fale conosco ;)" href="http://www.mentores.com.br/contato">Mentores</a>';
	}

	/**
	* faz a requisição para a folha de estilos na interface de login
	*/
	public function loginHead()
	{
		echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/assets/css/wp-admin.css' . '">';
	}

	/**
	* Cria página de opções para o tema
	*
	*/
	public function registerPages()
	{
		add_menu_page("Opções", "Opções", 'edit_pages', 'mentores-config', array($this, 'pageOptions'), '', 81);
	}

	/**
	* Exibe conteúdo da página de configuração
	*
	*/
	public function pageOptions()
	{
		include_once __DIR__ .'/../Admin/Pages/options.php';
	}

	/**
	*
	*/
	public function getOptionsList()
	{
		return $this->optionsList;
	}

	/**
	* Registra opção para ser exibida na página de configuração do tema
	*
	* @param $label string - Nome do campo, será exibido na página
	* @param $option string - Nome da opção a ser salva no banco
	*
	*/
	public function addOptionsList($label, $option)
	{
		$this->optionsList[$label] = $option;
	}

	public function persistOptions()
	{
		if (!empty($_POST['form-options'])) {
			$options = $this->getOptionsList();
			foreach ($options as $nome => $option) {
				update_option($option, $_POST['campo_' . $option]);
			}
			$mensagem = "Informações atualizadas";
		}
	}

}
