<?php

class MentoresShortCodes
{

	/**
	* Método construtor. Define variaveis da classe e adiciona qualquer action necessário
	*
	*/
	public function __construct()
	{
		//registra shortcodes
		add_shortcode('linha', array($this, 'linha'));
		add_shortcode('col', array($this, 'col'));
	}

	/**
	* Cria uma row no grid
	*
	*/
	public function linha($atts, $content)
	{
		//conteudo a ser ecrito no código
		return "<div class='row'>".do_shortcode($content).'</div>';
	}

	/**
	* Cria uma coluna no grid com largura e estilos inline
	*
	*/
	public function col($atts, $content)
	{
		extract ($atts);

		if (isset($largura)) {
			//caso seja maior que 12, seta para 12
			$largura = ($largura > 12) ? $largura = 12 : $largura;
			//define classe
			$grid = 'col-sm-' . $largura;
		} else {
			//caso largura não esteja definida
			$grid = 'col-sm-3';
		}

		if (isset($estilo)) {
			$style = 'style="' . $estilo .'"';
		} else {}

		if (isset($classe)) {
			$class = 'classe="' . $classe .'"';
		} else {}

		if (isset($pular)) {
			$offset = 'col-sm-offset-' . $pular;
		} else {

		}

		//conteudo a ser ecrito no código
		return "<div class='$grid $classe $offset col' $style>".do_shortcode($content).'</div>';
	}

}
