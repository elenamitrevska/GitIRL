<?php

// Configuration common to all environments
include_once __DIR__ . '/wp-config.common.php';

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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'irl');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '.t6R7RL-yFm@_0z&QYAM|SYaj3KMi6.c6/Q*2c`H&[4Z>smWFi@$_4f,4.g[|oLS');
define('SECURE_AUTH_KEY',  'vi3_:=]|R<Hw%x,RrIFi-CZ_IAM[gQh}06@QYYIRMRj Y<I!E>A26;}gQ/m[Xhg!');
define('LOGGED_IN_KEY',    '.Un&8v6P0<OX`q>&0C6 +:ejU3GE{y7U}?#TaY>I@d.Z}D$Ai:|6Y66pQn8.n(f_');
define('NONCE_KEY',        'aH5?vCEV+n1-QZK,JR.aj|tVT.@ =r.t?m2Cy,N-0{ZlQU=vkWxD9iol+@H8>WV5');
define('AUTH_SALT',        '#d+J0K8wUT{Ngny_2.Ub@$DMw*GmU~*%5J%S~Z{>Al^uRgM^yzZ7Np/D!>N0d e/');
define('SECURE_AUTH_SALT', 'Y=)kA_Q_p)U:X7M(rN|+GE(:+^p}I:C?s?GfI;duSI:WiemE%4mbgI-?zbTp@kd#');
define('LOGGED_IN_SALT',   'c2,V?E6$^$yKkYnn`Om.XU+u|F8S^#[0ktjwvgLJg~@.f;*Lg_#8i3_C7$w:++KZ');
define('NONCE_SALT',       'kb;=>.O@KRn!*UFT|=%@6|jxN~h#],hsTruwVQg?}!hq?5{QS6tnsw7nQXN![2*X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_ALLOW_REPAIR', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
