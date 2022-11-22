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
define( 'DB_NAME', 'elte' );

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
define( 'AUTH_KEY',         'Hi/$H_ufXN}V?toU0C!wKV5Y*p( M6(KsS>ok+d3?t=K -,SE19ZYX/13-Rd`O29' );
define( 'SECURE_AUTH_KEY',  '#*+z|UWWf@%3aqXtKtSdbB%~p`L:l :l>q0OuHTy)h+4((zSww~Gfr/gyhk>;S&q' );
define( 'LOGGED_IN_KEY',    ':]!I8lD3u*/`kA$y&~6HQ`Z7JW:p0.#| fGHO3Y=&.Wd!|.pf9q|oh,m u,|dB/U' );
define( 'NONCE_KEY',        '<.xKAhM)[<^_<M`9&GHJO 1O]k]#8.eXJq|oM O WRp*q:QJ@A;mqpJB+G}haNT|' );
define( 'AUTH_SALT',        'dD CeO>LO7Com;],z`*~~vO$1GFs?,C>7)y*@FVs$OfZ 2K$bwF|0!}lmS+5>(<1' );
define( 'SECURE_AUTH_SALT', '#Jo]UX#3|)1]gDV?q]mbw_E2fZMV`,#~EY#4(v}T7NR(uDf)oOa=7[&M 59ljr50' );
define( 'LOGGED_IN_SALT',   'E*2*c48?p[+c]6m`7?R9yhg`mRY{N,?f6.lpH3_`%wybbI(Y%<ne415,BZgYDq[a' );
define( 'NONCE_SALT',       '5i|GEJNMG=3L]5riirkE#ES=BK+TX6Udz,.FQ*?Cc/(Tz5UeAL(_H!B8SU:rv~zh' );

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
