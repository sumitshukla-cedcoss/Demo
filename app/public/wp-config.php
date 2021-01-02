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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DO8G1SSvaHk3AmO66Es83RCz4GniyPfYIt0G686udEwLVG2/Lt0F2ZOyEd7fNu6u8Ni+ThKx7Zc/W9BKIe4ZYg==');
define('SECURE_AUTH_KEY',  'kUW5wSxtG6nNGjosoqmjvCKmkBwir7iokHvDVqaEzahfNSs8aGwAklr1Wp0a3py6mFXZ44B5TrZb+9Mv00FjCg==');
define('LOGGED_IN_KEY',    'zNqxBV9W3xsloNp6B4r6ExpoUGJ2SlasuLntxRDokFGfbX51M3UYlwVZ08prv8ROtV8nQBslphCNMToRx7jgYw==');
define('NONCE_KEY',        'qb0mqLF48KDF2g/Jk2Aa+7r/Ie1BD1Q0b1zvpmA12PzLLMbzpWCW9dewJNrwEO/m3luoso3xpywn6N0lRlPB4w==');
define('AUTH_SALT',        'I/rJPwQfe7/s8kjy/zVF+NbbFbD1Hl+XjTc+Np8vPDh8FLVTiXbIv/Qj39b7zLZAKZkxMlFSIExFqHmniDW3UQ==');
define('SECURE_AUTH_SALT', 'coa+eDkXx0vZVgkPpgXA9EMCIXel0uw7ktaixNfPdBK+dS8C8TdeJ+pOHSNDQmKDPlFsNzwq/2HsMatkprfdLg==');
define('LOGGED_IN_SALT',   '9YQiP0Ks+gnPh99lWDgBbL/Si8C5/yOTn59of8TdKqp/9KCEDit5we6lLC/a2V/3sjcxEaX7CgNDvDtUmF43dg==');
define('NONCE_SALT',       'mARKuXbdgVcLa6UWt5cFCj7UA6anWds21vTGqsro51TqHskFzQmiYGdJgaB4sIwxCgTdsDjg2wWr0q0irDulXA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
