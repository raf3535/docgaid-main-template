<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'localic' );

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
define( 'AUTH_KEY',         '5{.:82o!/W<n/5pD;b!K;4fjLi-pfBvzQqbm7d9$+Q~Na+JZ[]p BimB0T0BTPJW' );
define( 'SECURE_AUTH_KEY',  ';K602Yo7m|pIyq7-E5S7vixW^%fxPfbK_1_@}G7#&K$|9XgA^;%L/jg<d|BLkdxK' );
define( 'LOGGED_IN_KEY',    'xA[- *kB/hm25{KZv,5cU96U*F&??PGCri31~.y)^Eb&h(FXyfM -T+uk0qylYh3' );
define( 'NONCE_KEY',        'IN-V?VNO7>>S.zXSq]X5*XCmA34>81I#euLi=qNglr;Y]:svww!9tWYF-}@Of_;P' );
define( 'AUTH_SALT',        'YhObse?;AH0g*}o~sfWR7!Y8RJmd-8iQ|zQg^sVU*Fk;-m&abJ!gi_Cvv8D?X_{u' );
define( 'SECURE_AUTH_SALT', 'jCcB~JtxkzF^ g9h+8^{3axU0x^E4o@/QWw?CDuz* L;B]<bX/o7(Az[CK]+8;yq' );
define( 'LOGGED_IN_SALT',   'cNl@r)EdAy RSv5bG5E09uls5e@ #|O8b:g/dBotxzgXgt  Z<e#`^4[ANQ[u+31' );
define( 'NONCE_SALT',       'NWc@|z:{Tl>ecwwreLH$1ah(~b{,e.97/8?&pYrg:b[R5M)>tU_d0_eksTr/k0;e' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
