<?php


namespace Msav\WordPress\Plugin\DisableWPRevisions;


if ( !class_exists("DisableWPRevisionsPlugin") ) {
	/**
	 * Class DisableWPRevisionsPlugin
	 * @package Msav\WordPress\Plugin\DisableWPRevisions
	 */
	class DisableWPRevisionsPlugin {

		/** @var DisableWPRevisionsPlugin|null Singleton */
		private static $instance = null;

		/**
		 * @return DisableWPRevisionsPlugin
		 */
		public static function getInstance() {
			if ( self::$instance == null ) {
				self::$instance = new DisableWPRevisionsPlugin();
			}
			return self::$instance;
		}

		public function disableRevisions() {
			$post_types = get_post_types();
			foreach ( $post_types as $post_type ) {
				remove_post_type_support($post_type, "revisions");
			}
		}

		public function filterRevisionsToKeep($revisions) {
			return 0;
		}

		public function init() {
			add_action("admin_init", [$this, "disableRevisions"]);
			add_action("wp_revisions_to_keep", [$this, "filterRevisionsToKeep"]);
		}
	}
}