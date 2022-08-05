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
define( 'DB_NAME', 'trance_db' );

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
define( 'AUTH_KEY',         'XsZ^z[/9(w/#4gBhSkpI2H<g5(G2U~g9o}j+^WUY:hPM9]$Bn7xQe-,W%28}4a2_' );
define( 'SECURE_AUTH_KEY',  'B*nE%mc~S;Bzv]{INmb8E ;O}hP])(np.gcF|mFNBU/&>_tBBC_t=)X>!}`T^8f|' );
define( 'LOGGED_IN_KEY',    'n{P{>N[y;.F4ThF#ttlo{*0Apljy*~nvzuOXqDWMHZKVu;yr}mJoeb>Ic7saHgsI' );
define( 'NONCE_KEY',        ')HiCIm$DtJF]Y?&+ALEtGqPM8Y!z9ubMx1uxrsOPzc[7AO0xRAtOgA1MGL>z;+xf' );
define( 'AUTH_SALT',        ' 3neDkPQ#Q]E+1uCj#!LH6iKH?*Z(l#l)1RFbC0/W*R{AS6.2L+byuo+y2Er_v53' );
define( 'SECURE_AUTH_SALT', '}dK998nKRZdX?O2W_e$Xg,1-[sWfKD$Clb=4@)HJhSxTR8<&)=OWu}APx_1G>Nxt' );
define( 'LOGGED_IN_SALT',   '.-NIR}i7iH$fG,<8l b{? M~AyWrMzpfAktd*4t`^e_yNt*|?M*%-2T/O>>O)dIJ' );
define( 'NONCE_SALT',       'xfbO[X58&J{b1x`oH+m|tFPEc^Z{2%A kC~yu%B>x#wMX/?!KnB{=n~CZpNAV,{:' );

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
