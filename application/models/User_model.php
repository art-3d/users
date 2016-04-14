<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public $name;
	public $last_name;
	public $middle_name;
	public $email;
	public $experience;
	public $comment;
	public $created;
	public $updated;

	public function __construct()
	{
		parent::__construct();
        	$this->load->database();
	}

	public function get_all($page, $max = 10)
	{		
		// "SELECT u.*, GROUP_CONCAT(' ', s.title) as skills FROM user AS u JOIN skill AS s ON u.id=s.user_id GROUP BY u.id LIMIT 

		$this->db->select('user.*, GROUP_CONCAT(" ", skill.title) as skills');
		$this->db->from('user');
		$this->db->join('skill', 'user.id = skill.user_id');
		$this->db->group_by('user.id');
		$start = ($page-1)*$max;
		$this->db->limit( $max, $start);
		$query = $this->db->get();
		$users = $query->result();


		return $users;
	}

	public function get_count()
	{
		return $this->db->count_all_results('user');
	}

	public function add_user($user, $skills)
	{
		$this->db->set($user);
		$this->db->insert('user');

		$result = $this->db->select('max(id) as max_id')->from('user')->get()->result();
		$user_id = $result[0]->max_id;

		foreach ($skills as $skill) {
			$this->db->set('user_id', $user_id);
			$this->db->set('title', $skill);
			$this->db->insert('skill');
		}

		return $user_id; 
	}

	public function get_user($id)
	{
		$this->db->select('user.*, GROUP_CONCAT(" ", skill.title) as skills');
		$this->db->from('user');
		$this->db->join('skill', 'user.id = skill.user_id');
		$this->db->where("user.id = $id");
		$this->db->group_by('user.id');

		$query = $this->db->get();
		$users = $query->result();

		return array_shift($users);
	}

	public function update_user($user, $skills)
	{
		$this->db->where('id', $user['id']);
		$this->db->update('user', $user);

		$this->db->delete( 'skill', ['user_id' => $user['id']] );

		foreach ($skills as $skill) {
			$this->db->set('user_id', $user['id']);
			$this->db->set('title', $skill);
			$this->db->insert('skill');
		}		
	}

	public function get_filterd_users($order, $date_from, $date_until, $search, $search_field)
	{
		$this->db->select('user.*, GROUP_CONCAT(" ", skill.title) as skills, COUNT(user.id) as count');
		$this->db->from('user');
		$this->db->join('skill', 'user.id = skill.user_id');

		if ( !empty($search_field) && !empty($search) ) $this->db->like($search_field, $search);
		if ( !empty($date_from) ) $this->db->where('created >', strtotime($date_from) );
		if ( !empty($date_until) ) $this->db->where('created <', strtotime($date_until) );
		$this->db->group_by('user.id');
		if ( !empty($order) ) $this->db->order_by($order);
		$query = $this->db->get();
		$users = $query->result();

		return $users;
	}
}