<?php
class admin_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function user()
	{
		$this->db->from('users');
		$this->db->join('role','role.rid=users.rid');
		$query=$this->db->get();
		return $query->result();
	}
	
	
	function add_user($data)
	{
		$query=$this->db->insert('users',$data);
	}
	
	function edit_user($uid)
	{
		$this->db->from('users');
		$this->db->where('uid',$uid);
		$query=$this->db->get();
		return $query->result();
	}
	
	function update_user($uid)
	{
		if($this->input->post('password')!=null)
		{
			$data=array(
				'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'firstname'=>$this->input->post('firstname'),
				'lastname'=>$this->input->post('lastname'),
				'email'=>$this->input->post('email'),
				'tel'=>$this->input->post('tel'),
				'address'=>$this->input->post('address'),
				'rid'=>$this->input->post('role'),
			);
		} else {
			$data=array(
				'username'=>$this->input->post('username'),
				'firstname'=>$this->input->post('firstname'),
				'lastname'=>$this->input->post('lastname'),
				'email'=>$this->input->post('email'),
				'tel'=>$this->input->post('tel'),
				'address'=>$this->input->post('address'),
				'rid'=>$this->input->post('role'),
			);
		}
		$this->db->where('uid',$uid);
		$query=$this->db->update('users',$data);
	}
	
	function delete_user($uid)
	{
		$this->db->where('uid',$uid);
		$query=$this->db->delete('users');
	}
	
	function role()
	{
		$role=$this->db->get('role');
		return $role->result();
	}
		
	function category_menu()
	{
		$this->db->from('category');
		$category_menu=$this->db->get();
		return $category_menu->result();
	}
	
	function category($limit,$offset)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->limit($limit,$offset);
		$this->db->order_by('cid','desc');
		$category=$this->db->get();
		if($category->num_rows()>0)
		{
			return $category->result();
		}
		return false;
	}
	
	function menu_category()
	{
		$this->db->from('category');
		$menu_category=$this->db->order_by('cid','desc')->get();
		return $menu_category->result();
	}
	
	function add_category($data)
	{
		$query=$this->db->insert('category',$data);
	}
	
	function edit_category($cid)
	{
		$category=$this->db->get_where('category',array('cid'=>$cid));
		return $category->result();
		
	}

	function update_category()
	{
		$cid = $this->input->post('cid');
		$data=array(
			'category_name'=> $this->input->post('category'),
			);
		$this->db->where('cid',$cid);
		$this->db->update('category',$data);
	}
	
	function delete_category($cid)
	{
		$query=$this->db->delete('category',array('cid'=>$cid));
	}
	
	function menu($limit,$offset)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('category', 'category.cid = menu.cid');
		$this->db->order_by('mid','desc');
		$this->db->limit($limit,$offset);
		$menu=$this->db->get();
		if($menu->num_rows()>0)
		{
			return $menu->result();
		}
		return false;
	}
	
	function count_category()
	{
		return $this->db->count_all('category');	
	}
	
	function count_menu()
	{
		return $this->db->count_all('menu');	
	}

	function count_queue()
	{
		return $this->db->count_all('queue');	
	}
	
	function add_menu($data)
	{
		$query=$this->db->insert('menu',$data);
	}
	
	function edit_menu($id)
	{	
		$menu=$this->db->get_where('menu',array('mid'=>$id));
		return $menu->result();
		
	}

	function update_menu()
	{
		$id = $this->input->post('id');
		$data=array(
			'menu_name' => $this->input->post('menu'),
			'cid' => $this->input->post('category'),
			'price' => $this->input->post('price')
		);
		$this->db->update('menu',$data,array('mid'=>$id));
		
	}
	
	function delete_menu($id)
	{
		$query=$this->db->delete('menu',array('mid'=>$id));
	}
	
	function queue()
	{
		$queue=$this->db->get('queue');
		return $queue->result();
	}

	function add_queue()
	{
		$data=array(
			'queue'=> $this->input->post('queue'),
			);
		$this->db->insert('queue',$data);
	}
	
	function update_queue()
	{
		$data=array(
			'queue'=> $this->input->post('queue'),
			);
		$this->db->update('queue',$data);
	}
	
	
	function payment()
	{
		$payment=$this->db->where('status','1')->order_by('pid','desc')->get('payment');
		return $payment->result();

	}
	
	function payment_list($id)
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->join('payment_list', 'payment_list.pid = payment.pid');
		$this->db->join('menu','menu.mid=payment_list.mid');
		$this->db->join('users','users.uid=payment.uid');
		$this->db->where('payment_list.pid',$id)->where('payment_list.status','1');
		
		$details=$this->db->get();
		return $details->result_array();
	}
	
	function delete_payment($id)
	{
		$this->db->where('pid',$id)->where('status','1')->delete('payment');
		$this->db->where('pid',$id)->where('status','1')->delete('payment_list');	
	}
	
	function analytic()
	{
		$query = $this->db->from('payment_list')
									->join('menu','menu.mid=payment_list.mid')
									->join('category','category.cid=menu.cid')
									->get();
		return $query->result_array();
	}
	
	function analytic_graph()
	{
		$query = $this->db->select('*')
							->from('payment')
							->where('payment.status','1')	
							->group_by('payment.date')							
							->limit(7)
							->get();
		return array_reverse($query->result_array());
	}
	
	function analytic_export()
	{
		if($this->input->post('startdate')!=null and $this->input->post('enddate')!=null )
		{
			mysql_query("SET NAMES 'tis620' ");
			$start=$this->input->post('startdate');
			$end=$this->input->post('enddate');
			$this->db->select('payment.date,category.category_name,menu.menu_name,menu.price');
			$this->db->select('payment_list.number');
			$this->db->from('payment_list');
			$this->db->join('menu','menu.mid=payment_list.mid');		
			$this->db->join('category','category.cid=menu.cid');
			$this->db->join('payment', 'payment.pid = payment_list.pid');
			$this->db->group_by('payment.date');
			$this->db->group_by('menu.mid');
			$this->db->where('payment.date >=',$start);
			$this->db->where('payment.date <=',$end);	
			$this->db->where('payment.status','1');
			$this->db->where('payment_list.status','1');	
			$this->db->order_by('payment.date');
			return $this->db->get();
		} else {
			mysql_query("SET NAMES 'tis620' ");
			$this->db->select('payment.date,category.category_name,menu.menu_name,menu.price');
			$this->db->select_sum('payment_list.number');
			$this->db->from('payment_list');
			$this->db->join('menu','menu.mid=payment_list.mid');		
			$this->db->join('category','category.cid = menu.cid');
			$this->db->join('payment', 'payment.pid = payment_list.pid');
			$this->db->where('payment.status','1');
			$this->db->where('payment_list.status','1');	
			$this->db->group_by('payment.date');
			$this->db->group_by('menu.mid');
			$this->db->order_by('payment.date');
			return $query=$this->db->get();
		}
	}
	
	function analytic_total_sell_today()
	{
		$today = date('Y-m-d');
		$query = $this->db->select_sum('total_discount')
									->from('payment')
									->where('payment.date',$today)
									->where('payment.status','1')
									->get();
		return $query;
	}
	
	function analytic_total_sell()
	{
		$query = $this->db->select_sum('total_discount')
								->from('payment')
								->where('payment.status','1')
								->get();

		return $query;
	}
			
}