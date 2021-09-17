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
define( 'DB_NAME', 'crowell_db' );

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
define( 'AUTH_KEY',         'iC72hyTa7H=~;T<K`Uj;AqsabQ*r<]m#8%i@M/]RLc<FhgVTTI<r:P3F2z,oyG33' );
define( 'SECURE_AUTH_KEY',  'mLO`,9B`LPbH rShq3reV0}wpHCz|%u^GnkbwcIowYN<Vf!(Fe]OOI#Uyc^3gU$b' );
define( 'LOGGED_IN_KEY',    'xSrZk2fE7iW]X6 <Q2O*Dp)mC[>HrNcb4my2[VQ`f[l8HQ~ YeYDWOC5kO|v%rb7' );
define( 'NONCE_KEY',        '2+#Ta?;bM:B#eCrYHDfX%3S9}^o~JT]8k~hks,Z@5u@b&zDJ<J*@uy&~.)]SsbG[' );
define( 'AUTH_SALT',        '}h$;7|R;8]C@./RfPBO<1UcDVteGPNW.Y7$9SPv%-_?{OJD0S-%hUxGQiIN2^`+h' );
define( 'SECURE_AUTH_SALT', '%P.Tb& f`[VtJHvcSh=[S*Mu/P<o6q oc?e|y^9VE?V*P4mUS}).*e{-whtR=)]5' );
define( 'LOGGED_IN_SALT',   ' U8hD!#V~vdGnfHQ]Pc0Zoh1 6x60d1Euq?F9O$Uh>{M/5ynr82u*ebZ [Ot QOU' );
define( 'NONCE_SALT',       'd)[,0O{Hr6CArZBkv@kx9Z<nj([7toKoD6a/o]/l+9IDz=p1]2.mDL4U [3y;F<f' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cowl_';

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
