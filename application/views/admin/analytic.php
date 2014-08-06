<div class="main">
<div id="analytic-box">
    <hr />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
	<?php 
	foreach($graph as $row)
	{
		$number=$row['total_discount'];
		$date=$row['date'];
		
		$dataset[]="['$date',$number]";
	}
	$data=implode(",",$dataset);
	?>
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ว-ด-ป', 'รายได้(บาท)'],
		<?php echo $data;?>
        ]);

        var options = {
          title: 'ยอดขายย้อนหลัง 7 วัน'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<div id="chart_div" style="width: 900px; height: 500px;"></div>
	
<h3>สถิติ</h3>
	<div>
    <h4>ยอดขายรวมวันนี้</h4>
    <?php
		foreach($total_sell_today->result() as $row1)
		{
			$today=$row1->total_discount;
		}
		if($today==null)
		{
			echo '0 บาท';
		}else{
			echo $today.' บาท';
		}
	?>
    </div>
    <hr />
	<div>
    <h4>ยอดขายรวม</h4>
    <?php
		foreach($total_sell->result() as $row2)
		{
			$all = $row2->total_discount;
		}
		if($all==null)
		{
			echo '0 บาท';
		}else{
			echo $all.' บาท';
		}
	?>
    </div>	
    <hr />
    <?php
		$category = $this->db->select('*')
										->from('category')
										->get();
		foreach($category->result_array() as $row3)
		{
			$cid= $row3['cid'];
			$menu=$this->db->select('*')
										->select_sum('payment_list.number')
										->from('payment_list')
										->join('menu','payment_list.mid=menu.mid')
										->join('category','category.cid=menu.cid')
										->where('payment_list.status','1')
										->where('menu.cid',$cid)
										->group_by('category.cid')
										->group_by('menu.mid')
										->order_by('number','desc')
										->limit(3)
										->get();
	?>
	<div>
    <h4><?php echo 'ยอดนิยมของ'.$row3['category_name']; ?></h4>
	<?php 			
			foreach($menu->result_array() as $row4)
			{
			?>
				<?php echo $row4['menu_name'].'<br>'; ?>

	<?php
			}
     ?>
	</div> 
    <hr />
	<?php
		}
     ?>
</div>
<h3>ส่งข้อมูลออก </h3>
<form id="form" name="form" method="post" action="<?=base_url('admin/export')?>">
  Start Date:
  <input name="startdate" type="text" id="startdate" />
  End Date:
  <input name="enddate" type="text" id="enddate" />
  <input type="submit" name="button" id="button" value="Submit" />
</form>
<p>&nbsp;</p>
        
</div>