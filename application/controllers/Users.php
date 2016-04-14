<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

	public $layout_view = 'layout/default';

	public function __construct ()
	{
		parent::__construct();

		$this->load->library('layout');

		// Local resource used for all pages served by this controller
		// js
		$this->layout->js('/js/jquery-2.2.2.min.js');
		$this->layout->js('/js/bootstrap.min.js');
		$this->layout->js('/js/jquery-ui.js');
		$this->layout->js('/js/lodash.min.js');
		$this->layout->js('/js/script.js');
		// css
		$this->layout->css('/css/style.css');
		$this->layout->css('/css/bootstrap.min.css');
		$this->layout->css('/css/bootstrap-theme.min.css');
		$this->layout->css('/css/jquery-ui.css');
	}

	public function index()
	{
		$this->load->model('user_model');

		$data = [];
		
		$page = $this->input->get('page') > 1 ? $this->input->get('page') : 1;
		$max = 3;
		$data['users'] = $this->user_model->get_all($page, $max);

		// for pagination
		$count = $this->user_model->get_count();
		$data['prev_page_class'] = ($page > 1) ? '' : 'disabled'; 
		$data['prev_page'] = $page - 1;
		$data['next_page_class'] =  ($page * $max) < $count ? '' : 'disabled';
		$data['next_page'] = $page + 1;

		$this->layout->title('Пользователи');
		$this->layout->view('users/index', $data);
	}

	public function add()
	{
		
		if ( $this->input->post() ) {
			$this->load->model('user_model');
			$this->load->helper('url');

			$user = [
				'name' => $this->input->post('name'),
				'last_name' => $this->input->post('last_name'),
				'middle_name' => $this->input->post('middle_name'),
				'email' => $this->input->post('email'),
				'experience' => $this->input->post('experience'),
				'comment' => $this->input->post('comment'),
			];
			$skills = explode( ',', $this->input->post('skill') );

			$user_id = $this->user_model->add_user($user, $skills);

			redirect('http://localhost:8888/users/user/'.$user_id);
		} else {
			$this->layout->title('Добавить пользователя');
			$this->layout->view('users/add');
		}
	}

	public function user($id)
	{
		$this->load->model('user_model');

		if ( $this->input->post() ) {

			$user = [
				'id' => $this->input->post('id'),
				'name' => $this->input->post('name'),
				'last_name' => $this->input->post('last_name'),
				'middle_name' => $this->input->post('middle_name'),
				'email' => $this->input->post('email'),
				'experience' => $this->input->post('experience'),
				'comment' => $this->input->post('comment'),
				'updated' => time(),
			];
			$skills = explode( ',', $this->input->post('skill') );

			$this->user_model->update_user($user, $skills);
		}

		$user = $this->user_model->get_user( (int)$id );

		$data = [];
		$data['user'] = $user;
		$data['skills'] = explode(', ', $user->skills);

		$this->layout->title('Пользователь: ' . $user->name);
		$this->layout->view('users/user', $data);	
	}

	public function error()
	{
		$this->layout->title('404');
		$this->layout->view('users/error');
	}

	public function get_users()
	{

		if ( $this->input->is_ajax_request() ) {
			$this->load->model('user_model');

			$order = $this->input->get('order');
			$date_from = $this->input->get('date_from');
			$date_until = $this->input->get('date_until');
			$search = $this->input->get('search');
			$search_field = $this->input->get('search_field');

			$data['users'] = $this->user_model->get_filterd_users($order, $date_from, $date_until, $search, $search_field);


			$this->output
				->set_content_type('application/json')
				->set_output( json_encode($data) );

		} else {
			$this->load->helper('url');
			redirect('http://localhost:8888/users/error');
		}
	}


}