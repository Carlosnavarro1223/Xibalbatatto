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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'xibalbatatto' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
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
define( 'AUTH_KEY',         'sM?i< 0 ,/xM*LT&vVQ#n];I6,u$D U90Yw<JnUe_EVRfKZ~2wb,S.)pKc*#!i$]' );
define( 'SECURE_AUTH_KEY',  '<nO!u~uL@yW6;Ym,/[|3HXgTas9,97uu5.6Z&t,&Dq,DN&w[d*ZH5ySjjeX%EBtK' );
define( 'LOGGED_IN_KEY',    '.Rw!xoyFQ/M`*(tTkT~!)$AAXf>x08Uc?7<zx)UUe=X>L^ipYlr24!5AB[&fCOM3' );
define( 'NONCE_KEY',        'yB]1#H;K=rbu6A;&4i@Zg/^&~C>(4=@bv@p,y.b#I;p;Y@)y!9`B}]sJ2SMV!fd(' );
define( 'AUTH_SALT',        'TQ`UIHz$+*HHRZET_pv@KQ0+2d/+gjlx4KG8v__)+f,fD$Abfog{IeWn@k!ZBdcQ' );
define( 'SECURE_AUTH_SALT', '536?<w264[=;b xqq7wW}wB1@dMM*d8CWdhx= PY*p@F6d]=`AnYI]{[{$CfWS%b' );
define( 'LOGGED_IN_SALT',   'k>@8hCAeE6kRpftiRc%ZRR1:Iu9@<uM~S4]SE]?xTV,CMe/q2A~MiA:g.5fkdvce' );
define( 'NONCE_SALT',       '4etWWH4lbJ]FtT.xKTVL?B?cqG13UJ37psKKguP-iU=o&P9P*Q>Ku{pkoPPPj#0u' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
