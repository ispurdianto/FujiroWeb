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
define('DB_NAME', 'filter-air');

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
define('AUTH_KEY',         'mnS~MHb,4nAD^.I8h/X(pznSik)kM]-v?#sjF[Fa}b7GB7V!I8zPKZk j<$i<r#s');
define('SECURE_AUTH_KEY',  '@-e`;t3X2nY{tkB.qiFvj%GIXU-|PHK:lgssYQ+vLzTfiRpCRzC(&fc<QvDu~M=q');
define('LOGGED_IN_KEY',    '39O O {S4jjwlbg&h_QIth7*.!&QQAv6}My+^z8W-p+-C_)FZ^n$-H9KWY9X{)6i');
define('NONCE_KEY',        '<&Nu#.]w9C.Wa?gAk,<VV2 w*w9;4C+y|pkN)`WI/s1#sKeKj?2x-=lt V(Xwu!t');
define('AUTH_SALT',        'wq9J,, get=p|>A7NO[yT&+yT&Db3E0/iyK~!nc:7=:.RI}8PK].2w*>s[Y8XPUd');
define('SECURE_AUTH_SALT', 'sJ$7~t{:M<HHY$17<K%%soy_@74,XO|26.n[]d+4/^Su^T/A(XcxS4wu)c 8<-$K');
define('LOGGED_IN_SALT',   'Q)N5XlPbYPj=R2pqym_M[ bd[-~}O:K9~(b+@@17:];^g,u+qHt}||{Tc$ld+24J');
define('NONCE_SALT',       'I@]-e?:BiMQ^DP:Gsa]a59U06@$)ajuM3p+8ca^aY+/U%U]/p+5$BAn8_8l+ZO<0');

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
