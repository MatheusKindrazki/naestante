<?php
/**
* Página de configuração do template.
* Todo o conteúdo deste arquivo será exibido na página "Opções" no gerenciador do site.
*
*/

//Registra as opções que serão exibidas. O formulário é criado automaticamente
//opções padrão do wordpress
$this->addOptionsList('Título do site', 'blogname');
$this->addOptionsList('Descrição do site', 'blogdescription');
$this->addOptionsList('Email administrativo', 'admin_email');

$this->addOptionsList('Endereço', '_mts_endereco');
// $this->addOptionsList('Telefone', '_mts_telefone');
// $this->addOptionsList('Horário de Atendimento', '_mts_atendimento');
$this->addOptionsList('Localidade 1', '_mts_local1');
$this->addOptionsList('Telefone 1', '_mts_telefone1');
$this->addOptionsList('Localidade 2', '_mts_local2');
$this->addOptionsList('Telefone 2', '_mts_telefone2');
$this->addOptionsList('Localidade 3', '_mts_local3');
$this->addOptionsList('Telefone 3', '_mts_telefone3');
//opções personalizadas
$this->addOptionsList('Facebook', '_mts_facebook');
$this->addOptionsList('Twitter', '_mts_twitter');
$this->addOptionsList('Instagram', '_mts_instagram');
$this->addOptionsList('Youtube', '_mts_youtube');
$this->addOptionsList('LinkedIn', '_mts_linkedin');

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//não é preciso fazer nenhuma personalização no conteúdo abaixo.

$options = $this->getOptionsList();

$this->persistOptions();
?>

<div class="options">
	<h1>Configuração</h1>

	<?php if(isset($mensagem)) : ?>
		<div id="setting-error-settings_updated" class="updated settings-error">
			<p><strong><?php echo $mensagem; ?></strong></p>
		</div>
	<?php endif; ?>

	<form class="form-horizontal" method="post" action='#'>
		<?php foreach($options as $nome => $option) : ?>
			<div class="control-group group-<?php echo $option; ?>">
				<label class="control-label" for="campo_<?php echo $option; ?>"><?php echo $nome; ?></label>
				<div class="controls">
					<input type="text" id="campo_<?php echo $option; ?>" name="campo_<?php echo $option; ?>" value="<?php echo get_option($option); ?>" />
				</div>
			</div>
		<?php endforeach; ?>

		<input type="hidden" name="form-options" value="1" />
		<input type="submit" class="button-primary" value="enviar" />
	</form>
</div>
