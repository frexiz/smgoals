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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wpdev');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ')~H2[d6H.k;uN1^L@/#d~WkdlAY+}2M($T5tBZk!1)pI/dfkG>z8A(S8`x^aa> v');
define('SECURE_AUTH_KEY',  '|: c|PDy9LDrEYw_@%cw/#T}Hfl7q?D+qgT&PuXdx6E[:IT?itV?_JMzaE9`I{t$');
define('LOGGED_IN_KEY',    'zToQ@zsNc^iV/X[Mx;gmnp}9^IL2GX9bfzaBxWSfRyVuFaHQdP6Sg,9s[,6lL0#6');
define('NONCE_KEY',        'n1r5K]G$Co%}/zWiZQR=dnLg8y-ALY3?#P6h2)sR1Nh0vWaAOw8$i4v%AzhLzdrA');
define('AUTH_SALT',        '0}:AZ*Ke4s@B~#fJWl9[XxL5;$72IRfQm3XrR-3`<9Z&QfP(1Z:M}8GV1gLaHT;W');
define('SECURE_AUTH_SALT', '1N8d>sl3O%B~$B--]t;=VZ_n]^c0R[^4_3kd`YqYzz{03_x#u;hNI.nnYwISG}!D');
define('LOGGED_IN_SALT',   '?}/Szf FoQgw>EU[s|>1Ol}kaM0{^Pv&6]%I-_V>IRq,fq+G/ldg2TPv=.3|DLYm');
define('NONCE_SALT',       'EY?W9?ST0&?2{Y#BlD!tNwb{_`JDYQsD#[rV+)X8)HcY&Tt };*A3C,EP&T72Q4q');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
