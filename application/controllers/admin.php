<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('role')!='1')
		{
			redirect('home');
		}
	}
	
	public function index()
	{
		$config['base_url']=base_url('admin/index');
		$config['total_rows']=$this->admin_model->count_menu();
		$config['per_page']=10;
		$config['uri_segment']=3;
		$config['use_page_numbers'] = False;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
				
		$this->pagination->initialize($config);
		$page=$this->uri->segment(3);
		$data['menu'] = $this->admin_model->menu($config['per_page'],$page); 
		$data['links'] = $this->pagination->create_links();


		$this->load->view('admin/header');
		$this->load->view('admin/menu',$data);
	
	}
			
	
	function user()
	{
		$data['query']=$this->admin_model->user();

		$this->load->view('admin/header');
		$this->load->view('admin/user',$data);
		
	}
	
	function add_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'xss_clean|required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'xss_clean|required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'xss_clean|required|min_length[6]|matches[password_confirm]|sha1');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'xss_clean|required|matches[password]|sha1');
		$this->form_validation->set_rules('firstname', 'firstname', 'xss_clean|required');
		$this->form_validation->set_rules('lastname', 'lastname', 'xss_clean|required');
		$this->form_validation->set_rules('tel', 'tel', 'xss_clean|required');
		$this->form_validation->set_rules('address', 'address', 'xss_clean|required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'email' => $this->input->post('email'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'tel' => $this->input->post('tel'),
				'address' => $this->input->post('address'),
				'rid' => $this->input->post('role'),
			);
			$this->admin_model->add_user($data);
			redirect('admin/user');
		}

		$data['role']=$this->admin_model->role();
		
		$this->load->view('admin/header');
		$this->load->view('admin/add_user',$data);	
		
	}
	
	function edit_user($uid)
	{
		$this->form_validation->set_rules('username', 'Username', 'xss_clean|required');
		$this->form_validation->set_rules('email', 'Email', 'xss_clean|required');
		$this->form_validation->set_rules('password', 'Password', 'xss_clean|min_length[6]|matches[password_confirm]|sha1');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'xss_clean|matches[password]|sha1');
		$this->form_validation->set_rules('firstname', 'firstname', 'xss_clean|required');
		$this->form_validation->set_rules('lastname', 'lastname', 'xss_clean|required');
		if ($this->form_validation->run() == TRUE)
		{
			$this->admin_model->update_user($uid);
			redirect('admin/user');
		} 
		$data['query']=$this->admin_model->edit_user($uid);
		$data['role']=$this->admin_model->role();
		
		$this->load->view('admin/header');
		$this->load->view('admin/edit_user',$data);	
		
	}
		
	function delete_user($uid)
	{
		$this->admin_model->delete_user($uid);
		redirect('admin/user');
	}
	
	function category()
	{	
		$config['base_url']=base_url('admin/category');
		$config['total_rows']=$this->admin_model->count_category();
		$config['per_page']=10;
		$config['uri_segment']=3;
		$config['use_page_numbers'] = False;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
				
		$this->pagination->initialize($config);
		$page=$this->uri->segment(3);
		$data['category'] = $this->admin_model->category($config['per_page'],$page); 
		$data['links'] = $this->pagination->create_links();
		
		$this->load->view('admin/header');
		$this->load->view('admin/category',$data);
		
		
		$this->form_validation->set_rules('category', 'category', 'xss_clean|required');
		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'category_name' => $this->input->post('category'),
			);
			$this->admin_model->add_category($data);
			redirect('admin/category');
		}
	}
	

	function edit_category($id)
	{
		$data['category']=$this->admin_model->edit_category($id);

		$this->load->view('admin/header');
		$this->load->view('admin/edit_category',$data);
		
	}
	
	function update_category()
	{
		$this->admin_model->update_category();
		redirect('admin/category');
	}

	function delete_category($id)
	{
		$this->admin_model->delete_category($id);
		redirect('admin/category');
	}
	
	function add_menu()
	{
		if($this->admin_model->count_category()==null)
		{
			redirect('admin/category');
		}
		$data['category_menu']=$this->admin_model->category_menu();
		$this->load->view('admin/header');
		$this->load->view('admin/add_menu',$data);
		
		$this->form_validation->set_rules('menu', 'menu', 'xss_clean|required');
		$this->form_validation->set_rules('price', 'price', 'xss_clean|required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
				'menu_name' => $this->input->post('menu'),
				'cid' => $this->input->post('category'),
				'price' => $this->input->post('price'),
				);
			$this->admin_model->add_menu($data);
			redirect('admin');
		}
	}
	
	function edit_menu($id)
	{
		$data['menu']=$this->admin_model->edit_menu($id);
		$data['menu_category']=$this->admin_model->menu_category();
		
		$this->load->view('admin/header');
		$this->load->view('admin/edit_menu',$data);
	}
	
	function update_menu()
	{
		$this->admin_model->update_menu();
		redirect('admin');
	}
	
	function delete_menu($id)
	{
		$this->admin_model->delete_menu($id);
		redirect('admin');
	}
	
	function queue()
	{
		$data['queue']=$this->admin_model->queue();

		$this->load->view('admin/header');
		$this->load->view('admin/queue',$data);
		
	}
	
	
	function edit_queue()
	{
		$data['queue']=$this->admin_model->queue();
		
			$this->load->view('admin/header');
			$this->load->view('admin/edit_queue',$data);
		
	}
	
	function update_queue()
	{
		if($this->admin_model->count_queue()==null)
		{
			$this->admin_model->add_queue();
			redirect('admin/queue');
		} else {
		$this->admin_model->update_queue();
		redirect('admin/queue');
		}
	}
			
	function payment()
	{
		$data['payment']=$this->admin_model->payment();

		$this->load->view('admin/header');
		$this->load->view('admin/payment',$data);
		
	}

	function payment_list($id)
	{	
		$data['details']=$this->admin_model->payment_list($id);

		$this->load->view('admin/header');
		$this->load->view('admin/details',$data);
		
	}
	
	function payment_delete($id)
	{
		$this->admin_model->delete_payment($id);
		redirect('admin/payment');
	}
	
	function analytic()
	{
		$data['graph'] = $this->admin_model->analytic_graph();
		$data['total_sell_today'] = $this->admin_model->analytic_total_sell_today();
		$data['total_sell'] = $this->admin_model->analytic_total_sell();
		
		$this->load->view('admin/header');
		$this->load->view('admin/analytic',$data);		
	}
	
	function export()
	{

		$this->load->dbutil();
		$data=$this->admin_model->analytic_export();
			
		$download = $this->dbutil->csv_from_result($data);
	
		force_download('result.csv', $download);  	
	}

}