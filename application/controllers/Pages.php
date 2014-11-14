<?php
class Pages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('torrent_model');
	}

	public function view($page = 'home') {

	    if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
			// Whoops, we don't have a page for that!
			show_404();
	    }

	    $data['title'] = ucfirst($page); // Capitalize the first letter

		$data['torrents'] = $this->torrent_model->get_torrents();
			
	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/'.$page, $data);
	    $this->load->view('templates/footer', $data);
	}
}
