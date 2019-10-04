<?php
/**
 * Settings View Base.
 *
 * Abstract base class for creating views.
 *
 * @package    Tavern
 * @subpackage Admin
 * @author     WP Tavern <justintadlock@gmail.com>
 * @copyright  Copyright (c) 2009 - 2018, WP Tavern
 * @link       https://themehybrid.com/plugins/members
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Tavern\Settings\Admin\Views;

use Tavern\Settings\Admin\OptionsPage;

/**
 * View class.
 *
 * @since  1.0.0
 * @access public
 */
abstract class View {

	/**
	 * Returns the view name/ID.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	abstract public function name();

	/**
	 * Returns the internationalized, human-readable view label.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string
	 */
	abstract public function label();

	/**
	 * Called on the `admin_init` hook and should be used to register theme
	 * settings via the Settings API.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register() {}

	/**
	 * Called on the `load-{$page}` hook when the view is booted. Use this
	 * to add any actions or filters needed.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {}

	/**
	 * Called when the page's HTML is output for the view.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function template() {}
}
