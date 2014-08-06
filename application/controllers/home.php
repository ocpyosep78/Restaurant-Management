<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if($this->home_model->logged_in() == TRUE)
		{
			$data['queue']=$this->home_model->queue();
			$data['category']=$this->home_model->category();
			
			if($this->agent->is_mobile())
			{
				$this->load->view('mobile/home/header');
				$this->load->view('mobile/home/category',$data);
			} else {
				$this->load->view('header');
				$this->load->view('home/category',$data);
			}
		} else {
			redirect('home/login');
		}
	}

	function menu()
	{
		if($this->home_model->logged_in() == TRUE)
		{
			if($_POST)
			{
				$data['menu']=$this->home_model->menu();
				$this->load->view('home/menu',$data);		
			} else {
				redirect('home');
			}
		} else {
			redirect('home/login');
		}
	}
	
	function menu_mobile()
	{
		if($this->home_model->logged_in() == TRUE)
		{
			if($_POST)
			{
				$queue=$this->input->post('queue');
				$data['menu']=$this->home_model->menu();
				$this->load->view('mobile/home/menu',$data);	
			} else {
					redirect('home');
			}
		} else {
			redirect('home/login');
		}
	}
	
	function save_menu()
	{
		if($this->home_model->logged_in() == TRUE)
		{
			if(isset($_POST['data'])!=null)
			{
				$this->home_model->save_menu();
			} elseif(isset($_POST['mid'])!=null)
			{
				$this->home_model->save_menu_mobile();
			} else {
				redirect('home');
			}
		} else {
			redirect('home/login');
		}
	}
	
	function order()
	{
		if($this->home_model->logged_in() == TRUE)
		{
			$data['order']=$this->home_model->order();
			
			if($this->agent->is_mobile())
			{
				$this->load->view('mobile/home/header');
				$this->load->view('mobile/home/order',$data);
			} else {
				$this->load->view('header');
				$this->load->view('home/order',$data);
			}
		} else {
			redirect('home/login');
		}
	}
	
	function bill()
	{
		if($this->home_model->logged_in() == TRUE)
		{
			$data['queue']=$this->home_model->bill();
			
			if($this->agent->is_mobile())
			{
				$this->load->view('mobile/home/header');
				$this->load->view('mobile/home/bill',$data);
			} else {
				$this->load->view('header');
				$this->load->view('home/bill',$data);
			}
		} else {
			redirect('home/login');
		}
	}
	
	function checkbill()
	{
		if($this->home_model->logged_in() == TRUE)
		{
			if($_POST)
			{		
				$data['checkbill']=$this->home_model->checkbill();
				
				if($this->agent->is_mobile())
				{
					$this->load->view('mobile/home/header');
					$this->load->view('mobile/home/checkbill',$data);
				} else {
					$this->load->view('header');
					$this->load->view('home/checkbill',$data);
				}
			} else{
				redirect('home/bill');			
			}
		} else {
			redirect('home/login');
		}
	}
	
	function paid()
	{				
		if($this->home_model->logged_in() == TRUE)
		{
			if($this->agent->is_mobile())
			{
				$this->home_model->paid();
				redirect('home/bill');
			} else {
				if($_POST)
				{
					$this->home_model->paid();
					redirect('home/bill');
				} else{
					redirect('home/bill');
				}
			}
		} else {
			redirect('home/login');
		}
	}
	
	function paid_home()
	{				
		if($this->home_model->logged_in() == TRUE)
		{
			if($_POST)
			{
					$this->home_model->paid_home();
			}
		} else {
			redirect('home/login');
		}
	}
	
	function order_update($id)
	{
		if($this->home_model->logged_in() === TRUE)
		{
			$this->home_model->order_update($id);
			redirect('home/order');		
		} else {
			redirect('home/login');
		}
	}
	
	function order_delete($id)
	{
		if($this->home_model->logged_in() === TRUE)
		{
			$this->home_model->order_delete($id);
			redirect('home/order');		
		} else {
			redirect('home/login');
		}
	}
	
	function login()
	{
		if($this->home_model->logged_in() == TRUE)
		{
			redirect('home');
		} else {
			if($this->agent->is_mobile())
			{
				$this->load->view('mobile/home/login');
			} else {
				$this->load->view('header');
				$this->load->view('login');
			}
		}
	}
	
	function check_login()
	{
        if($this->home_model->validate()==True)
		{
            redirect('home');
        } else {
			redirect('home/login');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('home/login');

	}
	
}
