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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'each' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'S)W[]pfj#,M.<5,MVO`$1e8:pN%z;xQNxArCqoLC-z2tO(co$;~uUC<_5W,Ie2/8' );
define( 'SECURE_AUTH_KEY',  '}lEHZ&|kd!7^*p*5_){0hm)~s-6?LG$5o?T@*Ea=;yk_{[i?QIUKYZduVyya2rU$' );
define( 'LOGGED_IN_KEY',    ';w,+h(kBOA0W|7)ObZ0ig~h5{:bw|{GaT6u&f0JZ-+ha|w)qqZVElvsxgWw9x:pA' );
define( 'NONCE_KEY',        'y?v3pM-few>.q@noi/Eum<k.C`DZ(LxWGh[|+3)l%65Pp{]V%xilM+HCvMIWpzZ1' );
define( 'AUTH_SALT',        '@[Js,4L5DL_YPH;P&(?6kAzi.Z[}m0xZplRyUl~*>~G[GVqxoA?l5ElK%vR^nG~F' );
define( 'SECURE_AUTH_SALT', 't^c,q;hB>wz,>6YF%^)^eUU53xPRw.]bE@Ce^^gHMol<*peEqplNFpRV,![*[Vp1' );
define( 'LOGGED_IN_SALT',   '/5/WypcjEFGSx|[s_)+Q$=(?WUPF?fjY*:5U`k5!B?*t%bzG|=&oe)fF<Lqi&^~>' );
define( 'NONCE_SALT',       'VbHJ>T1?^4QOc>eluVBXA2?FX(TozWp(>[Xm?[$1p6DSgT0[dlH;19KCq`eyBQr+' );

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
