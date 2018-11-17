<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'naestante');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'naestante');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'mentores594');

/** Nome do host do MySQL */
define('DB_HOST', 'mysql995.umbler.com:41890');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'd1H,A$%2)NTw}a3>^D>.xOAiqCkvrKWX<IqpM<XFYsb^_x#}z_JBQ;wfI[~Wf($l');
define('SECURE_AUTH_KEY',  'b3Lp]1IACs.0JEGWbI*Yrc])23VTU*,44Q!.$h0uZSs,0yDWlD=fcb%Ep4p{(M*b');
define('LOGGED_IN_KEY',    'N`O=PpdS#u([:,P&%UPar]fCf|JYwZFHI8.xeG#;kgoRDmEB9kK/Ld1c3[n=A#uu');
define('NONCE_KEY',        '~Vs,*xPX8;i|*e8l+]J$.c2|i#6G:%J;S{_Xk[j5dGym80R{NEMy0o[?b5jM;QF#');
define('AUTH_SALT',        '!q_y*[RMX>I|d/h5*Ea[;q}POyT0|i:4yn+/l/QD{w=5D:G(:>GTe!/F:lgag_=J');
define('SECURE_AUTH_SALT', 'e6~FADVJ2%EER:[to2iASKIf7zUME*ekaPA)svL0R>2bF|L&QblRu8So)`nvK>ry');
define('LOGGED_IN_SALT',   '.lNG6,K,}x-8jR @;on6=hx6.r ^8+B)IGeLG.hp9;3EHAth4HT*g<`=9=<P|$<J');
define('NONCE_SALT',       '=0G4v2_$u5*I-F>p[Sf_Q+n|VFBIvLE,zb6MTG%S3K,P$F4b=X>$,`rBi:C5o*Mo');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'ne_';
define('WP_HOME', 'http://localhost/naestante/');
define('WP_SITEURL', 'http://localhost/naestante/');
/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
