<?php include APPPATH.'views/admin/master/header.php'; ?>
<?php include APPPATH.'views/admin/master/navbar.php'; ?>
<?php include APPPATH.'views/admin/master/system-sub-navbar.php'; ?>
<?php include APPPATH.'views/admin/master/system-left-menu.php'?>
<?php include APPPATH.'views/admin/master/footer.php'; ?>



		function GetMediaNameAllInfo()
		{
			$mediaInfo = '';
			$searchText = '';
			$sl = 1;

			$config['base_url'] = '#';
			$config['total_rows'] = $this->MediaNameModel->CountRows();
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = '&gt';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['num_links'] = 1;

			$this->pagination->initialize($config);
			$page = $this->uri->segment(3);
			$start = ($page - 1) * $config['per_page'];

			echo "Start = ".$config['per_page'];
			exit();

			if ($this->input->post('searchText'))
			{
				$searchText = $this->input->post('searchText');
			}

			$data = $this->MediaNameModel->GetMediaNameAllInfo($searchText,$config['per_page'],$start);

			$mediaInfo .='
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Sl</th>
							<th>Name</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
			';

			if ($data == "")
			{
				$mediaInfo .= '<tr>';
				$mediaInfo .= '<td colspan="4" class="error-message">';
				$mediaInfo .= 'Oops! Sorry, No Data Found...';
				$mediaInfo .= '</td>';
				$mediaInfo .= '</tr>';
			}
			else
			{
				foreach ($data as $value)
				{
					$mediaInfo .= '<tr>';
					$mediaInfo .= '<td>'.$sl.'</td>';
					$mediaInfo .= '<td>'.$value->Name.'</td>';
					$mediaInfo .= '<td><img src="'.base_url().$value->Image.'" width="80px" height="80px"></td>';
					$mediaInfo .= '<td><a href="'.base_url('index.php/MediaName/Edit/').$value->Id.'" class="btn btn-info">Edit</a> <a href="'.base_url('index.php/MediaName/Delete/').$value->Id.'" class="btn btn-danger">Delete</a></td>';
					$mediaInfo .= '</tr>';
					$sl++;
				}
			}

			$mediaInfo .= '
					</tbody>
				</table>
			';

			$output = array(
				'paginationLink' => $this->pagination->create_links(),
				'resultTable' => $mediaInfo
			);

			echo json_encode($output);
		}

		

		public function GetMediaNameAllInfo($searchText=NULL,$limit=NULL,$start=NULL)
		{
			// echo $searchText;
			if ($searchText == "")
			{
				$sql = "SELECT * FROM media ORDER BY ID ASC LIMIT ".$start.", ".$limit;
			}
			else
			{
				$sql = "SELECT * FROM media WHERE Name LIKE '%".$searchText."%' ORDER BY ID DESC LIMIT ".$start.", ".$limit;
			}

			$mediaQuery = $this->db->query($sql);

			if ($mediaQuery->num_rows() > 0)
			{
				return $mediaQuery->result();
			}
			else
			{
				return false;
			}
		}