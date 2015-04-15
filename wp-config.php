<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

/** These settings are automatically used on your OpenShift Gear*/
if (getenv('OPENSHIFT_APP_NAME') != "") {
	/** The name of the database for WordPress */
	define('DB_NAME', getenv('OPENSHIFT_APP_NAME'));

	/** MySQL database username */
	define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));

	/** MySQL database password */
	define('DB_PASSWORD', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));

	/** MySQL hostname */
	define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST') . ':' . getenv('OPENSHIFT_MYSQL_DB_PORT'));

/** These settings can be configured for your local development environment
	and will not affect your OpenShift configuration */
} else {
	define('DB_NAME', 'calicotrio_v2');

	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', '');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');
}



/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jkV4:q+r.c6cY3e~,AgNf.7EFpm~e[8Q-Uh/*.;u,A8%_|.*!df-72gF*Ul-7*pr');
define('SECURE_AUTH_KEY',  'o/0HGJ!__9Jd2|Q/cyZGr^;q3P$ZL*f-n?ts7x7Kzn-oC(!)xp?fDXtvAaHhiAQF');
define('LOGGED_IN_KEY',    'Xa-R.pN-xPKy]7maq|e=XgYBey:Pr$qr1~fg|4^4k>w_!5~BvLp2|^E2HN<-jh9`');
define('NONCE_KEY',        '0G;.zn^PV4YRFO,  `amNo?L8m{Q*:%eBexKm+ LK |=bW5f%)Xr!fKP ebw*V_;');
define('AUTH_SALT',        ';v[?q>jRt|,:]53qBC9b?F+(ManS&84,7^>c7&8v&+d/)I%|_#RiGg_Jx7!`lWc?');
define('SECURE_AUTH_SALT', 'SMA)vr`$$Qyt/49YoPHie$I(&mrlD-RYA>p?uaCB+DR7SBro)3l:|kB=Ihe@_[u[');
define('LOGGED_IN_SALT',   'h$S}.|j6I5u;)=RO<F~[8~|P2z?qmYI8biV@aCXqe4_ThWj94`dl-fse:?/I+;(f');
define('NONCE_SALT',       '1]WA@$14WVS.YOyirrV&JLc46HX@OzpFp1j>HJuj-i&q|L+-sEbcZO(UYaea({[l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'calicotrio_v2_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
