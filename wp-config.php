<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

/**
 * WordPress Home Redirect and use correct DB
 * @author John Carroll
 */

if (isset($_SERVER) && isset($_SERVER['SERVER_NAME'])) {
	switch($_SERVER['SERVER_NAME'])
	{
	    case 'churchbay.kode8.com':
				define('DB_NAME', 'churchbay');
				define('DB_USER', 'churchbay');
				define('DB_PASSWORD', 'sqBxNF7e6dXP');
				define('DB_HOST', 'localhost');
				define('DB_CHARSET', 'utf8');
				define('DB_COLLATE', '');
				$WP_HOME = 'http://churchbay.kode8.com';
				$WP_SITEURL = 'http://churchbay.kode8.com';
	    break;

	    case 'localdev.churchbay.kode8.com':
				define('DB_NAME', 'churchbay');
				define('DB_USER', 'root');
				define('DB_PASSWORD', 'thosoola3');
				define('DB_HOST', 'localhost');
				define('DB_CHARSET', 'utf8');
				define('DB_COLLATE', '');
				$WP_HOME = 'http://localdev.churchbay.kode8.com';
				$WP_SITEURL = 'http://localdev.churchbay.kode8.com';
	    break;

	}
}

/**
 * Set default WP directory location
 */
define('WP_HOME', $WP_HOME);
define('WP_SITEURL', $WP_SITEURL);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         'uc1:ZzR):k4g?epKy>4TeW0`53*HI7jbS@ql5$ka-4sk;CrJp<s%t}JQ~-HhVhQf');
 define('SECURE_AUTH_KEY',  'o9 ]L[R$WlT1t*-#PGL%@wgCl{%.fpRqn^z&Le.^E5(5RTmS^i04,Ch5f_.a+6eC');
 define('LOGGED_IN_KEY',    '|pqxVmUxzNe8 xIuM^J|Ck8m<7AxY*CRsl{r~WS[V{|vwoa{run~.!N`^jQrj#TI');
 define('NONCE_KEY',        'v_A@|x]/Iimzddx>3gk|(+=X|exCHuV6ds.N*2n;}C%2U]*PRw[`L,c]F#k9|o5s');
 define('AUTH_SALT',        '$m18g6;LRov0u:6KwLoyY}hedx^:yHKx%`c&uI>N-u=`i|YKW%~DX&A=@|E-&.Ut');
 define('SECURE_AUTH_SALT', 'nV.a>%C8Q<jaW]sdq)$[gWgdkE8!^H{Bp|)3+n9pt_|3*opgf=|!C+H7{]dEr)W`');
 define('LOGGED_IN_SALT',   'cCEY-drX=5fg (h>rikV,!@)#Ko^K%~>u19sqjzpodQZhiv>4^1K!abO*46`-nwy');
 define('NONCE_SALT',       '*mq#-*aV+lTrz}:6gwC%Q|h7 o&*?>-)E|It+L-to?Sx$U=7~ab[6xA(E!yrbDi)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cb_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'FS_METHOD', 'direct' );
