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
define( 'DB_NAME', 'my_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'n491jA~h9-P>_9:I2+)cr^v+aaBBX&i8UFQVjw(9`&Y~|`?+<m-?_x$K1#Q_%(oM');
define('SECURE_AUTH_KEY',  '}MXX=Bx,L$8I||m?90I8jW$]7}A#QR|I7.ANI3|eOa`,SWaO^ h+P.fRXD$cj:?4');
define('LOGGED_IN_KEY',    'B;M(,QnU*0grcMlQ>Ot?+>@Z.m>c(JG5TI4mL}$P>X^9e.BJzup$cUN7e53ajWI2');
define('NONCE_KEY',        '<5_;YR0Itt(`1Op`Kko(<Bc$Jw~TUc:SWvbSM >~@+EI;|79,N*4~ofQ<:+GD*}|');
define('AUTH_SALT',        'wFtu)DRhzhF|/7S6Iee9e#f%/_o1|PI:la8Ct||i$sE>V;a%]|%WlC&LX&8:](G.');
define('SECURE_AUTH_SALT', '#gny{2rMn+yG!7^|tD,7<-D}p5z63:?,-RgSJCXxLcUPe^E5ty`5Sy,>AP?14C*h');
define('LOGGED_IN_SALT',   'Ayzz<SuxhM61;gWdS`gy(-1-/y/+, XqPp(w,|t|wXNOGD;<Q5T|/HE&U`|wvW}u');
define('NONCE_SALT',       'Xgr=|Zy97q7U -8(-Ne4d60bG/1-ukg]dqMHG&*:*Hb^rp zAFogH+(+~2N%>B+x');

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';