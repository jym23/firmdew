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
define('DB_NAME', 'firmdew');
#define('DB_NAME', 'a9676827_firmdew');

/** MySQL database username */
//define('DB_USER', 'usetest_f_user');
define('DB_USER', 'root');
#define('DB_USER', 'a9676827_user');

/** MySQL database password */
#define('DB_PASSWORD', 'M.vP_T+!TpiM');
define('DB_PASSWORD', '');
#define('DB_PASSWORD', 'firmdew_#_517');

/** MySQL hostname */
define('DB_HOST', 'localhost');
#define('DB_HOST', 'mysql6.000webhost.com');

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
define('AUTH_KEY',         'KlL6ejh%Ixq0&3UhyFl(@m_!-SGlpo|tK3LfZgQA5o7xs{K&a; dTQCD022A;G[D');
define('SECURE_AUTH_KEY',  'yR8H8~s7EyBs2ItQ )+d /3oYz<x_N^tO>)|Fr(a8Xr|J@L){=Az+%|fY{T}vMn)');
define('LOGGED_IN_KEY',    'b2#A8,Tu+wf+KF %M@<4rdLa7DTpQ1NS<Q^{0U/S4h1M;=G)DD+(a|((` Y-cP-D');
define('NONCE_KEY',        'c|f+3x2kbEJ~~- n0E=hCKH>w,zaJ`C9#?RNH@B8DbW=HOM6oS&M@VV;~yMJI;H/');
define('AUTH_SALT',        'M7j.CgJ&hji2ploPDg>@zmN,X^z6ib#r|HK]0RuF,|!>YmwyBNxJkO@}S_vNAtYg');
define('SECURE_AUTH_SALT', 'X#MB9@[%{!i>iJ}sn|^Iw[+kv:vBcusjn~GP=C;#i~fV^G(s4t=|z,lUS>#g!} 0');
define('LOGGED_IN_SALT',   '(P3YI9Z*bn>w|{0mxRl:~T(.ZAHv70GbG] h36tATw!2=n^cYWSBPeZ5}g$ZBMNE');
define('NONCE_SALT',       '-Z04F@^8BoOQ?R$J!%)GJHli,ow;8g+nIh2|Ry4to[LWqkZn<<V.|/spRH+<QWNZ');

/**#@-*/

/**
 * define site URL
 */
define('WP_HOME','http://localhost/firmdew');
define('WP_SITEURL','http://localhost/firmdew');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fd_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');