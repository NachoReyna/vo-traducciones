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
 
 define( 'WPCF7_VALIDATE_CONFIGURATION', false );
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'votraduc_traducciones');
/** MySQL database username */
define('DB_USER', 'votraduc_admin');
/** MySQL database password */
define('DB_PASSWORD', '}L@3Yyc2^[i%');
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
define('AUTH_KEY',         '29%<O<aayjE /wj8iKe HWwMu3!9EIkbXK<j!vZtE%;.9>[/k^9YVlIQ9KJ#OT!7');
define('SECURE_AUTH_KEY',  ':DB5)]QY:#HF)Ib&<9yK?Cs$jSwyN~Ip1Hc7zNw=D/D$xUE_ js<OVF(}fodHtFw');
define('LOGGED_IN_KEY',    'ed2`(vjWMeZ+wRJLaqI5u3OXFK#@du<I>kxOBUZ|M 3F@dP|&O}Jr:92vHv)C`f7');
define('NONCE_KEY',        'o06}m^t/tN H*g*~?]?g-8X2F3V H/X[NS2xtXLY3:r6`cG9t<!G2|e``Eg4m0B@');
define('AUTH_SALT',        '>~#tR*8:G6.Rtu*MS^0D*c&Z&:,6#c9Y,D,oanpE3_7!/O0N4< ;g_O:R)g!&CHq');
define('SECURE_AUTH_SALT', ';CX1|N!^iKMG.=hh_awKl39rUb%mN?;6EP~*6GYf!|kFC%.]@hUagWF>epT5VlQ*');
define('LOGGED_IN_SALT',   '^Lu4@G%1;en+d@wbiuBHz{[(G)joI6%)_ *2`^ FRj1[i.-3C hlr)a,I)FJs-5k');
define('NONCE_SALT',       '|F.qbz9~;q$janPZ1+?l&<a$T};/p`M4=yA2l0N`f<QK.r/bxg<-~!y~8KAgRAN?');
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
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
