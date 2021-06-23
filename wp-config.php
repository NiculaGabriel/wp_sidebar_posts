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
define( 'DB_NAME', 'wp_sidebar_test' );

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
define( 'AUTH_KEY',         '}MW:HT[q^FJJM>-m}7Hf:PV[B*VT1>Wat#+%GB|#@^{o}[d:[f_L?!m.r7(!xWn#' );
define( 'SECURE_AUTH_KEY',  'Hs=reK@v1cUglmX:f*8-1&]E+|!R?Lg|U@sbYW0U_^aO?P;{0Es&5Y|vO{h~[VRl' );
define( 'LOGGED_IN_KEY',    'p9lok QS1fcQIh5<Z;cYp}PsBi#xoL|4bn2$`?i4w6)O]ILyvc#96faqc,rv}0wY' );
define( 'NONCE_KEY',        'l2?9uWd=37X^,>dkMqco3aRxr0s?5w<`F4=mDz.fWy%GxAWUIL49;8=->`BtGU@D' );
define( 'AUTH_SALT',        'W`BoAnQ!M+zXJ 1(^Pd~ij+q%Mf]R~J:L.p4wN+N33d J1k7tSvt<)<4g`hG#C_V' );
define( 'SECURE_AUTH_SALT', 'I 8G|p`FmB}k!i,5rAMaoDp4,OK-EMK;zK-r#GBrk,dW2d2lv1e#o3,3hbp.(-1 ' );
define( 'LOGGED_IN_SALT',   'nVy*0LPM$y9Zm{EA:|&.a|V`S`8~Ghdi,$~4u_h(c{|RtU )w2ui`sjt9tqh#rFd' );
define( 'NONCE_SALT',       'C=za?NYQD0`C%&jflwkabys0)*y}yD/.CRI;*=%T,!<kp>AnEblj7~89><{x36b4' );

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

set_time_limit(300);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
