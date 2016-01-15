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
define('DB_NAME', 'vcsolutions');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '%&(Asn{M5~GrRrzB12gg`=w<}NI6tDkc?5sqO|)cH46pCs+AvJ#WD@ueFpJd&qHK');
define('SECURE_AUTH_KEY',  '4~Zq 9cn>W<Rg|k_<_|cFv~>_C!Bx$8/|+b{nyn+oZxO&f)d3/eze|wIhDfL%*gC');
define('LOGGED_IN_KEY',    '&E+4&:QKS%:6&gFS1Vws:XP |7g]W[Wkc]PrfNEe[|wV,&+a{25B+if_|[zJ-4-P');
define('NONCE_KEY',        '3&!N#m oy!c8I 2sAwJY)0,{]v6u+E3`uXR#c Rm+hl}0kbs  lB8!ADJS@248uv');
define('AUTH_SALT',        'W.S`-{Y}}J8|_z[Aszt7>H$V%,<a;]J%eZ~yc|vHzc K+)|-(l]*#uT8G-DgKHs|');
define('SECURE_AUTH_SALT', 'm(N23`|>@zef,OUN6eB2A}-1QoO$49)yEy8Q yZc1C5<dbhGvn:G&FYHg?j?Pp!a');
define('LOGGED_IN_SALT',   '7j/OYlWLXchH_Q =O)Uw<~cB(hhi>rz,E<bLR3f.-t %nn%s1ZIz]11QBK<oVzpt');
define('NONCE_SALT',       'd@3G}KZggy|p6lvw7-e!0ezz}[+t0X(t:[CAgflkO},D}My(/h[p&!l$,~|#<4y3');

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
