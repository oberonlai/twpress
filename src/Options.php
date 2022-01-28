<?php

use ODS\Option;

$config = new Option( 'twp-' );

$config->addMenu(
	array(
		'page_title' => __( 'Tailwind CSS Play CDN', 'twp' ),
		'menu_title' => __( 'Tailwind CSS Play CDN', 'twp' ),
		'capability' => 'manage_options',
		'slug'       => 'twp',
		'option'     => true,
	)
);

$config->addTab(
	array(
		array(
			'id'    => 'general_section',
			'title' => __( 'General Settings', 'twp' ),
			'desc'  => __( 'These are general settings for Tailwind CSS Play CDN', 'twp' ),
		),
	)
);

$config->addCheckboxes(
	'general_section',
	array(
		'id'      => 'position',
		'label'   => __( 'Enable Tailwind CSS', 'twp' ),
		'desc'    => __( 'You can enqueue in front end or admin page.', 'twp' ),
		'options' => array(
			'frontend' => __( 'Frontend', 'twp' ),
			'admin'    => __( 'Admin', 'twp' ),
		),
	),
);

$config->addText(
	'general_section',
	array(
		'id'                => 'prefix',
		'label'             => __( 'Prefix', 'twp' ),
		'desc'              => __( 'It is better to set Tailwind CSS class prefix to avoid the conflict with another css framework.', 'twp' ),
		'placeholder'       => 'ex:twp-',
		'size'              => 'regular',
	),
);

$config->addTextarea(
	'general_section',
	array(
		'id'    => 'config',
		'label' => __( 'Config', 'twp' ),
		'desc'  => __( 'Paste the tailwind.config JSON to customize your configuration with your own design tokens. The outside curly brackets is unnecessary.', 'twp' ),
	),
);

$config->addTextarea(
	'general_section',
	array(
		'id'    => 'custom',
		'label' => __( 'Custom CSS', 'twp' ),
		'desc'  => __( 'Add custom CSS that supports all of Tailwind\'s CSS features.', 'twp' ),
	),
);

$config->addCheckboxes(
	'general_section',
	array(
		'id'      => 'core-plugin',
		'label'   => __( 'Enable Plugins', 'twp' ),
		'desc'    => __( 'Enable core plugins, like forms and typography. <a href="https://tailwind CSS.com/docs/plugins" target="_blank" style="color:#2271b1;text-decoration:underline" rel="noopener norefferal">Instructions of Tailwind CSS core plugins.</a><br><span style="color:red">Notice! Load Tailwind CSS from CDN is required if you use core plugins. The default path of tailwind.js is in plugin folder: <b>twpress/assets/tailwind.js</b>  </span>', 'twp' ),
		'options' => array(
			'typography'   => __( 'Typography', 'twp' ),
			'forms'        => __( 'Forms', 'twp' ),
			'line-clamp'   => __( 'Line-clamp', 'twp' ),
			'aspect-ratio' => __( 'Aspect Ratio', 'twp' ),
		),
	),
);

$config->register(); // Don't forget this.
