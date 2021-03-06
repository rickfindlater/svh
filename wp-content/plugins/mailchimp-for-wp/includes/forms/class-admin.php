<?php

/**
 * Class MC4WP_Forms_Admin
 *
 * @ignore
 * @access private
 */
class MC4WP_Forms_Admin {

	/**
	 * @var MC4WP_Admin_Messages
	 */
	protected $messages;

	/**
	 * @var MC4WP_MailChimp
	 */
	protected $mailchimp;

	/**
	 * @param MC4WP_Admin_Messages $messages
	 * @param MC4WP_MailChimp $mailchimp
	 */
	public function __construct( MC4WP_Admin_Messages $messages, MC4WP_MailChimp $mailchimp ) {
		$this->messages = $messages;
		$this->mailchimp = $mailchimp;

		require dirname( __FILE__ ) . '/admin-functions.php';
	}

	/**
	 * Add hooks
	 */
	public function add_hooks() {
		add_action( 'mc4wp_save_form', array( $this, 'update_form_stylesheets' ) );
		add_action( 'mc4wp_admin_preview_form', array( $this, 'prepare_form_preview' ) );
		add_action( 'mc4wp_admin_edit_form', array( $this, 'process_save_form' ) );
		add_action( 'mc4wp_admin_add_form', array( $this, 'process_add_form' ) );
		add_filter( 'mc4wp_admin_menu_items', array( $this, 'add_menu_item' ), 5 );
		add_filter( 'wp_insert_post_data', array( $this, 'filter_form_content' ), 10, 2 );

		add_action( 'mc4wp_admin_show_forms_page-edit-form', array( $this, 'show_edit_page' ) );
		add_action( 'mc4wp_admin_show_forms_page-add-form', array( $this, 'show_add_page' ) );

		add_action( 'mc4wp_admin_enqueue_assets', array( $this, 'enqueue_assets' ), 10, 2 );
	}

	/**
	 * @param string $suffix
	 * @param string $page
	 */
	public function enqueue_assets( $suffix, $page = '' ) {

		if( $page !== 'forms' || empty( $_GET['view'] ) || $_GET['view'] !== 'edit-form' ) {
			return;
		}

		wp_register_script( 'mc4wp-forms-admin', MC4WP_PLUGIN_URL . 'assets/js/forms-admin' . $suffix . '.js', array( 'mc4wp-admin' ), MC4WP_VERSION, true );
		wp_enqueue_script( 'mc4wp-forms-admin');
	}

	/**
	 * @param $items
	 *
	 * @return mixed
	 */
	public function add_menu_item( $items ) {

		$items['forms'] = array(
			'title' => __( 'Forms', 'mailchimp-for-wp' ),
			'text' => __( 'Forms', 'mailchimp-for-wp' ),
			'slug' => 'forms',
			'callback' => array( $this, 'show_forms_page' ),
			'load_callback' => array( $this, 'redirect_to_form_action' )
		);

		return $items;
	}

	/**
	 * Act on the "add form" form
	 */
	public function process_add_form() {

		check_admin_referer( 'add_form', '_mc4wp_nonce' );

		$form_data = stripslashes_deep( $_POST['mc4wp_form'] );
		$form_content = include MC4WP_PLUGIN_DIR . 'config/default-form-content.php';
		$form_id = wp_insert_post(
			array(
				'post_type' => 'mc4wp-form',
				'post_status' => 'publish',
				'post_title' => $form_data['name'],
				'post_content' => $form_content,
			)
		);

		update_post_meta( $form_id, '_mc4wp_settings', $form_data['settings'] );

		$this->messages->flash( __( "<strong>Success!</strong> Form successfully saved.", 'mailchimp-for-wp' ) );
		wp_safe_redirect( mc4wp_get_edit_form_url( $form_id ) );
		exit;
	}

	/**
	 * Saves a form to the database
	 *
	 * @param $data
	 * @return int
	 */
	public function save_form( $data ) {

		$post_data = array(
			'post_type'     => 'mc4wp-form',
			'post_status'   => ! empty( $data['status'] ) ? $data['status'] : 'publish',
			'post_title'    => $data['name'],
			'post_content'  => $data['content']
		);

		if( ! empty( $data['ID'] ) ) {
			$post_data['ID'] = $data['ID'];

			$post = get_post( $data['ID'] );

			// check if attempted post is of post_type `mc4wp-form`
			if( ! is_object( $post ) || $post->post_type !== 'mc4wp-form' ) {
				wp_nonce_ays( '' );
				return 0;
			}
		}

		$form_id = wp_insert_post( $post_data );

		update_post_meta( $form_id, '_mc4wp_settings', $data['settings'] );

		// save form messages in individual meta keys
		foreach( $data['messages'] as $key => $message ) {
			update_post_meta( $form_id, 'text_' . $key, $message );
		}

		return $form_id;
	}

	/**
	 * Saves a form
	 */
	public function process_save_form( ) {

		check_admin_referer( 'edit_form', '_mc4wp_nonce' );
		$form_id = (int) $_POST['mc4wp_form_id'];

		$form_data = stripslashes_deep( $_POST['mc4wp_form'] );
		$form_data['ID'] = $form_id;

		// @todo sanitize data
		$this->save_form( $form_data );

		// update default form id?
		$default_form_id = (int) get_option( 'mc4wp_default_form_id', 0 );
		if( empty( $default_form_id ) ) {
			update_option( 'mc4wp_default_form_id', $form_id );
		}

		/**
		 * Runs right after a form is updated.
		 *
		 * @since 3.0
		 *
		 * @param int $form_id
		 */
		do_action( 'mc4wp_save_form', $form_id );

		$previewer = new MC4WP_Form_Previewer( $form_id );

		$this->messages->flash( __( "<strong>Success!</strong> Form successfully saved.", 'mailchimp-for-wp' ) . sprintf( ' <a href="%s">', $previewer->get_preview_url() ) . __( 'Preview form', 'mailchimp-for-wp' ) . '</a>' );
	}

	/**
	 * Goes through each form and aggregates array of stylesheet slugs to load.
	 *
	 * @hooked `mc4wp_save_form`
	 */
	public function update_form_stylesheets() {
		$stylesheets = array();

		$forms = mc4wp_get_forms();
		foreach( $forms as $form ) {

			$stylesheet = $form->get_stylesheet();

			if( ! empty( $stylesheet ) && ! in_array( $stylesheet, $stylesheets ) ) {
				$stylesheets[] = $stylesheet;
			}
		}

		update_option( 'mc4wp_form_stylesheets', $stylesheets );
	}

	/**
	 * Prepares a Form Preview
	 */
	public function prepare_form_preview() {
		$form_id = (int) $_POST['mc4wp_form_id'];
		$previewer = new MC4WP_Form_Previewer( $form_id, true );

		// get data
		$form_data = stripslashes_deep( $_POST['mc4wp_form'] );
		$form_data['ID'] =  $previewer->get_preview_id();
		$form_data['status'] = 'draft';

		// save as new post & update preview id
		$preview_id = $this->save_form( $form_data );
		$previewer->set_preview_id( $preview_id );

		// redirect to preview
		wp_safe_redirect( $previewer->get_preview_url() );
		exit;
	}

	/**
	 * Redirect to correct form action
	 *
	 * @ignore
	 */
	public function redirect_to_form_action() {

		if( ! empty( $_GET['view'] ) ) {
			return;
		}

		// query first available form and go there
		$forms = mc4wp_get_forms( array( 'numberposts' => 1 ) );

		// if we have a post, go to the "edit form" screen
		if( $forms ) {
			$form = array_pop( $forms );
			wp_safe_redirect( mc4wp_get_edit_form_url( $form->ID ) );
			exit;
		}

		// we don't have a form yet, go to "add new" screen
		wp_safe_redirect( mc4wp_get_add_form_url() );
		exit;
	}

	/**
	 * Show the Forms Settings page
	 *
	 * @internal
	 */
	public function show_forms_page() {

		$view = ! empty( $_GET['view'] ) ? $_GET['view'] : '';

		/**
		 * @ignore
		 */
		do_action( 'mc4wp_admin_show_forms_page', $view );

		/**
		 * @ignore
		 */
		do_action( 'mc4wp_admin_show_forms_page-' . $view );
	}

	/**
	 * Show the "Edit Form" page
	 *
	 * @internal
	 */
	public function show_edit_page() {
		$form_id = ( ! empty( $_GET['form_id'] ) ) ? (int) $_GET['form_id'] : 0;
		$lists = $this->mailchimp->get_lists();

		try{
			$form = mc4wp_get_form( $form_id );
		} catch( Exception $e ) {
			echo '<h2>' . __( "Form not found.", 'mailchimp-for-wp' ) . '</h2>';
			echo '<p>' . $e->getMessage() . '</p>';
			echo '<p><a href="javascript:history.go(-1);"> &lsaquo; '. __( 'Go back' ) .'</a></p>';
			return;
		}

		$opts = $form->settings;
		$active_tab = ( isset( $_GET['tab'] ) ) ? $_GET['tab'] : 'fields';

		require dirname( __FILE__ ) . '/views/edit-form.php';
	}

	/**
	 * Shows the "Add Form" page
	 *
	 * @internal
	 */
	public function show_add_page() {
		$lists = $this->mailchimp->get_lists();
		require dirname( __FILE__ ) . '/views/add-form.php';
	}

	/**
	 * Get URL for a tab on the current page.
	 *
	 * @since 3.0
	 * @internal
	 * @param $tab
	 * @return string
	 */
	public function tab_url( $tab ) {
		return add_query_arg( array( 'tab' => $tab ), remove_query_arg( 'tab' ) );
	}

	/**
	 * Fix for MultiSite, where only superadmins can save unfiltered HTML in post_content.
	 *
	 * @param array $data
	 * @param array $post_array
	 *
	 * @return array
	 */
	public function filter_form_content( $data, $post_array ) {
		// only act on our own post type
		if( $post_array['post_type'] !== 'mc4wp-form' ) {
			return $data;
		}

		// if `content` index is set, use that one.
		// this fixes an issue with `post_content` already being kses stripped at this point
		if( isset( $post_array['content'] ) ) {
			$data['post_content'] = $post_array['content'];
		}

		// remove <form> tags from form content
		$data['post_content'] = preg_replace( '/<\/?form(.|\s)*?>/i', '', $data['post_content'] );

		// make sure filtered post content is the same
		$data['post_content_filtered'] = $data['post_content'];
		return $data;
	}

}