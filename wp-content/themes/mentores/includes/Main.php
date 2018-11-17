<?php

require_once get_stylesheet_directory() . '/includes/Mentores/Abstracts/AbstractInstance.php';

class Mentores extends AbstractInstance
{

	protected function __construct()
	{
		$this->includes();

		$this->content		= new MentoresContents();
		$this->admin		= new MentoresAdmin();
		$this->widget		= new MentoresWidgets();
		$this->shortcode	= new MentoresShortCodes();
		$this->config		= new MentoresConfig();
		$this->query		= new MentoresQuery();
		$this->util			= new MentoresUtils();
		$this->acf			= new MentoresAcf();

		$this->includesModules();
	}

	private function includes()
	{
		require_once $this->getPath() . '/includes/Mentores/Contents.php';
		require_once $this->getPath() . '/includes/Mentores/Admin.php';
		require_once $this->getPath() . '/includes/Mentores/Widgets.php';
		require_once $this->getPath() . '/includes/Mentores/ShortCodes.php';
		require_once $this->getPath() . '/includes/Mentores/Ajax.php';
		require_once $this->getPath() . '/includes/Mentores/Query.php';
		require_once $this->getPath() . '/includes/Mentores/Assets.php';
		require_once $this->getPath() . '/includes/Mentores/Utils.php';
		require_once $this->getPath() . '/includes/Mentores/Acf.php';
		require_once $this->getPath() . '/includes/Config.php';
	}

	private function includesModules()
	{
		require_once $this->getPath() . '/includes/Modules/TermDescriptionEditor.php';
	}

	public function getUrl()
	{
		return get_stylesheet_directory_uri();
	}

	public function getPath()
	{
		return get_stylesheet_directory();
	}

	public function getParentUrl()
	{
		return get_template_directory_uri();
	}

	public function getParentPath()
	{
		return get_template_directory();
	}

}

function Mentores() {
	return $mentores = Mentores::instance();
}
$GLOBALS['mentores'] = Mentores();
