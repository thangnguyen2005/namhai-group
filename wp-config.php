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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'NamHaiGroup' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'ZeS2HSB94G01MUPGDSAG5YQfkpXtHVpfOMvQnQnGEwrBFSBHHbPqXOZD54bMYtwl' );
define( 'SECURE_AUTH_KEY',  'Wr2147NIK8xZk8QvEB0FVG43NCqgxlfEF5zAvjjmhcoc2MTK3A3L22Yk1T3DwpD3' );
define( 'LOGGED_IN_KEY',    'EtvbsrgSiic95zxnD3BSVrJBAlFSfFn41WvFPewcPAuXI691R1j6CKpP8q7SBqiA' );
define( 'NONCE_KEY',        '53UJhX09nzkUS48CzP5KBk8sSRSiSavVCqB8zG1WlLUzFwubfNK0ZcE025A1uWuv' );
define( 'AUTH_SALT',        'fYAHUiiI2AkVwMPSTm8F8eNsQhQ6S3jZW45raCWJP5aBhPPo9MZp6KoDYg8PUFAn' );
define( 'SECURE_AUTH_SALT', 'woiTJzXVQAuJtaf1A7OH5Ke3i70Bew7ev89iXnsSlsYm0rNYPjb7UocbEKv1nyP0' );
define( 'LOGGED_IN_SALT',   'QsFdl0jyKTrJYZ8oaFDsj2Qk6c2hupeVSaCcw1mgQyPfQzxMpxFJyKnsP79LdURa' );
define( 'NONCE_SALT',       'O9TXWFwpJkfESbFfLmvCtLeJd2vxPlI8wUbq1q85pN7zS1M1JK9RrmjNU7akMHCL' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
