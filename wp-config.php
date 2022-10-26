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
define( 'DB_NAME', 'news' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         ':V6D.k8];W~KC,1>~7U-j?QZ{iGIt4n35wd1<K@:ewp.|7Fw_f.ZHmzH`SQ<VO|*' );
define( 'SECURE_AUTH_KEY',  ')J>JYbM(OH0ygPb|-X3>48N]<qsy[|i!tn|+1@.4~q;JPWT1^5ah@9#kB_?.r%qw' );
define( 'LOGGED_IN_KEY',    'M#9(B>BQ[=>yC_S}mIN[bRVm65]sXzFkuF@)XhsnTLTdFH.}TnAh/KK|q,<YTfh6' );
define( 'NONCE_KEY',        'a@%dD|G1VHC*X&:l+]`#B[_+/:6W9en>0,A>b:&)c+ kq}iXZdnoDhdLvcWI1-kW' );
define( 'AUTH_SALT',        'MH`0[!I{:jx^eT)5{2kha+XX45g/y{Y,hRfJaPGb?_Lph~<aq46WeH=_./BrnteQ' );
define( 'SECURE_AUTH_SALT', 't,J]R^,Q?dbdtt9zy;i5ip SW9F+b0d<0RLUV_ [YPIUQ9{(Z<[8tpKnI4v1th1@' );
define( 'LOGGED_IN_SALT',   'XhDwB=Om*Sx::.wffaLVeVP!X6l*|OcM3}Ln2lgD8a}capad/U-w)O]O|tHw{goV' );
define( 'NONCE_SALT',       'p,cg9_ZDqU; Y(6UKzOBBncAc<T|e!>7#czKOLzGG+M2C[v)T-1:tv^V>wSXehq`' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
