<?php
class home_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function queue()
	{
		$query=$this->db->get('queue');
		return $query->result();
	}
	
	function category()
	{
		$query=$this->db->get('category');
		return $query->result();
	}
	
	function menu()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('category', 'category.cid = menu.cid');
		$this->db->where('menu.cid',$this->input->post('data'));
		
		$menu=$this->db->get();
		return $menu->result();
	}
	
	function menu_mobile()
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('category', 'category.cid = menu.cid');
		$this->db->where('menu.cid',$this->input->post('category'));
		
		$menu=$this->db->get();
		return $menu->result();
	}
	
	function save_menu()
	{
		$time = date('Y-m-d');
		$recive = stripslashes($_POST['data']);
		$arrData = json_decode($recive,true);
		$payment = $this->db->where('queue',$arrData['queue'])
										->where('status','0')
										->get('payment');
		if($payment->num_rows!='0')
		{
			foreach($payment->result_array()  as $row)
			{
				$pid = $row['pid'];
			}
			$count = count($arrData['mid']);	
			for($i=0;$i<$count;$i++)
			{
				$data1=array(
					'mid' => $arrData['mid'][$i],
					'number' => $arrData['number'][$i],
					'note' => $arrData['note'][$i],
					'pid' => $pid,
					'status' => '0',
				);
				$this->db->insert('payment_list',$data1);
			}
		} else {
			$data = array(
				'uid' => $this->session->userdata('uid'),
				'queue' => $arrData['queue'],
				'date' => $time,
				'status' => '0',
			);
			$last = $this->db->insert('payment',$data);
			$last = $this->db->insert_id();
			
			$query=$this->db->where('pid',$last)->get('payment');
			
			foreach($query->result_array() as $row)
			{
				$pid=$row['pid'];
			}

			$count = count($arrData['mid']);	
			for($i=0;$i<$count;$i++)
			{
				$data1=array(
					'mid' => $arrData['mid'][$i],
					'number' => $arrData['number'][$i],
					'note' => $arrData['note'][$i],
					'pid' => $pid,
					'status' => '0',
				);
				$this->db->insert('payment_list',$data1);
			}
		}
	}
	
	function save_menu_mobile($data)
	{
		$data=array(
			'queue' => $this->input->post('queue'),
			'mid' =>  $this->input->post('mid'),
			'number' =>  $this->input->post('number'),
			'note' =>  $this->input->post('note'),
		);
		
		$time = date('Y-m-d');

		$payment = $this->db->where('queue',$this->input->post('queue'))
										->where('status','0')
										->get('payment');
		if($payment->num_rows!='0')
		{
			foreach($payment->result_array()  as $row)
			{
				$pid = $row['pid'];
			}

			$data=array(
				'mid' =>  $this->input->post('mid'),
				'number' =>  $this->input->post('number'),
				'note' =>  $this->input->post('note'),
				'pid' => $pid,
				'status' => '0',
			);
			$this->db->insert('payment_list',$data);
		} else {
			$data = array(
				'uid' => $this->session->userdata('uid'),
				'queue' => $this->input->post('queue'),
				'date' => $time,
				'status' => '0',
			);
			$last = $this->db->insert('payment',$data);
			$last = $this->db->insert_id();
			$query=$this->db->where('pid',$last)->get('payment');
			
			foreach($query->result_array() as $row)
			{
				$pid=$row['pid'];
			}

			$data=array(
				'mid' =>  $this->input->post('mid'),
				'number' =>  $this->input->post('number'),
				'note' =>  $this->input->post('note'),
				'pid' => $pid,
				'status' => '0',
			);
				$this->db->insert('payment_list',$data);
			
		}
	}
	
	function order()
	{
		$order = $this->db->select('payment.queue,payment_list.id,menu.menu_name,payment_list.number,payment_list.note,payment_list.status')
								->from('payment_list')
								->join('payment','payment.pid = payment_list.pid')
								->join('menu','menu.mid = payment_list.mid')
								->where('payment.status','0')
								->order_by('payment_list.id','desc')
								->get();
		return $order->result();
	}
	
	function save_bill($data2)
	{
		$query=$this->db->insert('payment',$data2);
	}
		
	function bill()
	{
		$check = $this->db->from('payment')
								->join('payment_list','payment_list.pid = payment.pid')
								->where('payment.status','0')
								->where('payment_list.status','1')
								->get();
		if($check->num_rows()!=null)
		{
			$bill = $this->db->select('payment.queue')
									->from('payment')
									->join('payment_list','payment_list.pid = payment.pid')
									->where('payment.status','0')
									->where('payment_list.status','1')
									->group_by('payment.queue')
									->get();
			return $bill->result();
		} else {
			return null;
		}
	}

	function checkbill()
	{
		$queue=$this->input->post('queue');
		if($queue!=0)
		{
			$check = $this->db->select('*')
								->from('payment')
								->join('payment_list', 'payment_list.pid = payment.pid')
								->join('menu', 'menu.mid = payment_list.mid')
								->where('payment.status','0')
								->where('payment_list.status','0')
								->where('payment.queue',$queue)
								->get();
			if($check->num_rows()==0)
			{
				$checkbill = $this->db->select('*')
								->from('payment')
								->join('payment_list', 'payment_list.pid = payment.pid')
								->join('menu', 'menu.mid = payment_list.mid')
								->where('payment.status','0')
								->where('payment_list.status','1')
								->where('payment.queue',$queue)
								->get();
				return $checkbill->result();
			} else {
				$this->session->set_flashdata('error', 'true');
				redirect('home/bill');
				
			}
		} else {
			redirect('home/bill');
		}
	}
	
	function paid()
	{
		$queue = $this->input->post('queue');
		$data = array(
			'total' => $this->input->post('total'),
			'discount' =>$this->input->post('bill-discount'),
			'total_discount' => $this->input->post('bill-totaldiscount'),
			'cash' => $this->input->post('bill-cash'),
			'cashback' => $this->input->post('bill-cashback'),
			'status' => '1',
		);
		$payments = $this->db->where('payment.queue',$queue)
										->where('payment.status','0')
										->get('payment');
		foreach($payments->result() as $row)
		{
			$pid = $row->pid;
		}
		$this->db->where('queue',$queue)->where('pid',$pid)->update('payment',$data);		
	}
	
	function paid_home()
	{
		$time = date('Y-m-d');
		
		$recive = stripslashes($_POST['data']);
		$arrData = json_decode($recive,true);		
		
		$queue=$arrData['queue'];
		$data = array(
			'uid' => $this->session->userdata('uid'),
			'queue' => $queue,
			'total' => $arrData['total'],
			'discount' => $arrData['discount'],
			'total_discount' => $arrData['totaldiscount'],
			'cash' => $arrData['cash'],
			'cashback' => $arrData['cashback'],
			'date' => $time,
			'status' => '1'
		,
		);
		$last = $this->db->insert('payment',$data);
		$last = $this->db->insert_id();
		$query=$this->db->where('pid',$last)->get('payment');
		
		foreach($query->result_array() as $row)
		{
			$pid=$row['pid'];
		}
		$count = count($arrData['mid']);
				
		for($i=0;$i<$count;$i++)
		{
			$data1=array(
				'mid' => $arrData['mid'][$i],
				'number' => $arrData['number'][$i],
				'pid' => $pid,
				'status' => '1',
			);
			$this->db->insert('payment_list',$data1);
		}
		
	}
	
	function order_update($id)
	{
		$this->db->where('id',$id);
		$data=array(
			'status'=>'1'
		);
		$this->db->update('payment_list',$data);
	}
	
	function order_delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('payment_list');
	}
	
	function validate()
	{
	$username = $this->security->xss_clean($this->input->post('username'));
	$password = $this->security->xss_clean($this->input->post('password'));
	
	$this->db->where('username', $username);
	$this->db->where('password', sha1($password));
	$query = $this->db->get('users');
	
		if($query->num_rows == 1)
		{
			$row = $query->row();
				$data = array(
						'uid' => $row->uid,
						'firstname' => $row->firstname,
						'lastname' => $row->lastname,
						'username' => $row->username,
						'role'=> $row->rid,
						'logged_in' => TRUE,
						);
				$this->session->set_userdata($data);
				return true;
		} else {
			return false;
		}
	}
	
	function logged_in()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
}