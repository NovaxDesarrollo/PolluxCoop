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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'coop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'y zTpIe=2.e5o3ZPzk%5$f0{L@W?BH0~*dTK`@i~<B~@?a+!z~~sS3<[ Cu8%n }' );
define( 'SECURE_AUTH_KEY',  '/o tvl>T0aowX^I`[Dc0~:{2^+87*/5JE3r]t{Ko0ou7bHl=bxmDn6PLv$xQFMYZ' );
define( 'LOGGED_IN_KEY',    'zr9FuLiFruG_Ov<oN*!!.*KV2j+r [7iKK|@MG)1tRSe.g0Zd#tSZrj-w$Pb/XN~' );
define( 'NONCE_KEY',        '|=:82F<U_KW~{9G3o!u^7?`9N:BV;v2IZT1<<VpNw;rJ2l@sBUB%pREW<A>}3::z' );
define( 'AUTH_SALT',        'O~#7B|4 EPBZ#t|*7E8m]EXKShO=Sh9Ew,eNNDKq6O$C Cs M3q0ziYg4Kn?YfX`' );
define( 'SECURE_AUTH_SALT', 'OvKf-9]Yie}KNgeURz?jq.,<PSHwY|kI6*Sks#Ay;>Jl<X8z{ysay{K>l.<[6s0o' );
define( 'LOGGED_IN_SALT',   'Z2.NC2;9gV*NJ mFR,{oq%!5he7gZf>{.T-$[0&OVdjzQn~@>?ve*#8%MOnwcy9X' );
define( 'NONCE_SALT',       '?6P~TVqd^s0LFN}gK#^tN3RW6f>/[Fsa[W*++Niejch?lV^{F(q_:PymAuA2Z+k7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');
define('FTP_HOST','localhost');
define('FTP_USER','alejandro');
define('FTP_PASS','alejandro');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
