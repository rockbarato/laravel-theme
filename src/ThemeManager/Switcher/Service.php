<?php

namespace ThemeManager\Switcher;

use View;

/**
 * Manages app themes.
 * 
 * This service adds a new views' location, so the views for the theme can be loaded.
 */
class Service {

	/**
	 * File Finder
	 */
	protected $finder;


	/**
	 * Current Theme Name
	 */
	protected $currentTheme;


	/**
	 * Theme Options
	 */
	protected $options = [
		'theme_path' => 'resources/views/themes',
		'asset_path' => 'public/themes',
	];
	
	/**
	 * Constructs this instance.
	 */
	public function __construct() {
		$this->finder = app('view.finder');
	}
	
	/**
	 * Gets the current theme name. 
	 * 
	 * @return string
	 */
	public function name() {
		return $this->currentTheme;
	}
	
	/**
	 * Get the path for views.
	 * 
	 * @return string;
	 */
	public function viewPath() {
		return $this->options['theme_path'] . '/' . $this->name();
	}
	
	/**
	 * Gets a path to an asset.
	 * 
	 * @param string @path Path to the asset.
	 * @return string;
	 */
	public function asset($path) {
		return asset($this->options['asset_path'] . '/' . $this->name() . '/' . $path);
	}

	/**
	 * Sets the theme.
	 * 
	 * @param string $name Theme name.
	 * @param array $options Theme options.
	 */
	public function set($name, array $options = []) {
		$this->currentTheme = $name;
		$this->options = array_merge($this->options, $options);
		
		$this->finder->addLocation(base_path($this->viewPath()));
	}
}