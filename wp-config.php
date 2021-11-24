<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'tatvasoft_practical' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'q)p$o!VQYx[I{@T,@?6,T2xryJq#Z%=j1xCHeN(I,5ki9:d&j()Or784=i%zc >%' );
define( 'SECURE_AUTH_KEY',  'F`bt&&:86Wow-ct1~n0/mVs|yB5gx.M%B(@ b}:f?=R$8af|5&5ncy$c&1lR_#TP' );
define( 'LOGGED_IN_KEY',    'bH_es]FZ[6g)/dQ$YAF}13#%;,F<t3}_e};*T10CQTk^FU>$wgE!*Y)x=_[B)zyg' );
define( 'NONCE_KEY',        'uH8qL;,cEzG0mX!syb3Hpnar$k8|HqU0}zj$Mt84,cW:KBC?Qv&TKJiMRijqE:^s' );
define( 'AUTH_SALT',        'qLj/|a#`w,&sp!1-H;!_@u6&/|;Ge]DsMr-<_TA8~lFRss)Wxa(>!~8cG%[=zI?w' );
define( 'SECURE_AUTH_SALT', '.^#6aB_1_k?#4z`sPjho]%_P:]lt$l0|t@5rrv*5r7^C<qc5gCMN$}6BVN&p.?CY' );
define( 'LOGGED_IN_SALT',   'm#3!M(^&d0cwA).^_&W<7-@FgHBA|55`WUisf#0X#T&7vNmOrsZc}CeT%Pll*>QQ' );
define( 'NONCE_SALT',       ']C0h7fQa{+[n|c]9hZ{Wn=0FLQD$nQ[ui{T,qQ^!miYA67F9kA&Q.|87@4nK93Wz' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
