<?php
/**
 * Query component.
 *
 * Handles filters on the posts query.
 *
 * @package   Tavern
 * @author    WP Tavern <justintadlock@gmail.com>
 * @copyright 2019 WP Tavern
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://wptavern.com
 */

namespace Tavern\Query;

use WP_Query;
use Hybrid\Contracts\Bootable;
use Tavern\Template\Loop;

/**
 * Query component class.
 *
 * @since  1.0.0
 * @access public
 */
class Component implements Bootable {

	/**
	 * Bootstraps the class' actions/filters.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {

		add_action( 'pre_get_posts', [ $this, 'preGetPosts' ] );
	}

	/**
	 * Sets the posts-per-page to 100 on archive pages.  This theme outputs
	 * a list of posts instead of the "normal" archive view.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  \WP_Query  $query
	 * @return void
	 */
	public function preGetPosts( WP_Query $query ) {

		// Bail if we're in the admin.
		if ( is_admin() ) {
			return;
		}

		if ( $query->is_main_query() && $query->is_archive() ) {

			$query->set( 'posts_per_page', absint( Loop::limit() ) );

		} elseif ( $query->is_main_query() && $query->is_home() ) {

			$query->set( 'posts_per_page', absint( Loop::limit( 'blog' ) ) );
		}
	}
}
