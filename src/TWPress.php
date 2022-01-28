<?php

namespace TWP;

defined( 'ABSPATH' ) || exit;


class TWPress {

	private $postion;
	private $prefix;
	private $preflight;
	private $config;
	private $custom;
	private $plugin;

	public static function register() {
		$class = new self();
		add_action( 'init', array( $class, 'init' ) );
	}

	public function init() {
		$this->position  = get_option( 'twp-position' );
		$this->prefix    = get_option( 'twp-prefix' );
		$this->preflight = get_option( 'twp-preflight' );
		$this->config    = get_option( 'twp-config' );
		$this->custom    = get_option( 'twp-custom' );
		$this->plugin    = get_option( 'twp-core-plugin' );

		if ( $this->position ) {
			foreach ( $this->position as $key => $value ) {
				if ( 'frontend' === $key ) {
					add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
					add_action( 'wp_footer', array( $this, 'config' ), 99 );
					add_action( 'wp_footer', array( $this, 'custom' ), 99 );
				}

				if ( 'admin' === $key ) {
					add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
					add_action( 'admin_footer', array( $this, 'config' ), 99 );
					add_action( 'admin_footer', array( $this, 'custom' ), 99 );
				}
			}
		}
	}

	public function enqueue() {
		if ( $this->plugin ) {
			$plugin_arr = array_map(
				function( $key ) {
					return $key;
				},
				$this->plugin
			);

			$plugin = '?plugins=' . implode( ',', $plugin_arr );
			wp_enqueue_script( 'tw', 'https://cdn.tailwindcss.com' . $plugin, array(), null );
		} else {
			wp_enqueue_script( 'tw', TWP_PLUGIN_URL . 'assets/tailwind.js', array(), '3.0.14' );
		}
	}

	public function config() {
		$config = '<script> tailwind.config = { ';

		if ( ! empty( $this->prefix ) ) {
			$config .= 'prefix:"' . $this->prefix . '",';
		}

		if ( is_admin() ) {
			$config .= 'corePlugins: {
				preflight: false,
			},';
		}

		if ( ! empty( $this->config ) ) {
			$config .= $this->config;
		}
		echo $config . '}</script>';
	}

	public function custom() {
		if ( ! empty( $this->custom ) ) {
			echo '<style type="text/tailwindcss">' . $this->custom . '</style>';
		}
	}
}

TWPress::register();
