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

define( 'FS_METHOD', 'direct' );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tekl' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '@Rodj1234' );

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
define( 'AUTH_KEY',         'oGrp}E;tHn{mD}07oNe8UAO6+R2U8 6$l1pO6g623(`_yX4q>d+}Os*$~U.ais0q' );
define( 'SECURE_AUTH_KEY',  '>}~=!1Ze7H~3Ov.{<?QwEm5gk;;-YZ}#_Se7vM+f9F((Bg$)M(}.S&=y,Wd^zb9G' );
define( 'LOGGED_IN_KEY',    'r5,&#BZ>Ej];5V-n_N:hg+WX1+3Zu7,sS&( GF8kXICn}H:j5B#!Tpq:49!QZX2;' );
define( 'NONCE_KEY',        'w2g9^k(tGhc:#tHpkvQ)BbR4MJw/sN(D>aDmEPongRz*MJ0I`VS?LkNE|)a`k#|A' );
define( 'AUTH_SALT',        'FR&D_wP8gi&dEiYb!!y@9UjKg&Cern~~LBXu#PH>O`tp#z-xr% KLH?^Z?[Acdx.' );
define( 'SECURE_AUTH_SALT', 'i})eP^7OihEZ(+lyVPy9~KHU=>SN_x>=m*g5yqTVRtk<H[GN7Z`]UT4_;[vcCaK*' );
define( 'LOGGED_IN_SALT',   '>pI}EuaC.bq[z:[<*T4K?HB*(-JI*).:>>mm`|{ 50x!Z$miz{xxA?%o.qprB{TS' );
define( 'NONCE_SALT',       'yD=Mx8x&W5I.(u^]oD>iATv0^E3xqHFZXzllH!n!$z~Fxy=C}PLPBkl( 5(%-|6]' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
