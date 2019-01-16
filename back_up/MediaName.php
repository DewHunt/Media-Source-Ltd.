<?php
	/**
	 * 
	 */
	class MediaName extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('AdminModel');
			$this->load->model('MediaNameModel');
			$this->load->library('pagination');
		}

		public function GetAdminAllInfo()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminAllInfo($adminUserName,$adminPassword);
		}

		public function GetAdminId()
		{
			$adminUserName = $this->session->userdata('adminUserName');
			$adminPassword = $this->session->userdata('adminPassword');

			return $this->AdminModel->GetAdminId($adminUserName,$adminPassword);
		}

		public function Index()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Media Name - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					// 'mediaInfo' => $this->MediaNameModel->GetMediaNameAllInfo()
					'mediaInfo' => ''
				);

				$this->load->view('admin/system_setup/media/media-name',$data);
			}
		}

		public function MediaName($msg = NULL)
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$data = array(
					'title' => 'Media Name - Media Source Ltd.',
					'adminInfo' => $this->GetAdminAllInfo(),
					'message' => $msg
				);

				$this->load->view('admin/system_setup/media/create-media-name',$data);				
			}
		}

		public function CreateMediaName()
		{
			if ($this->session->userdata('adminUserName') == "" || $this->session->userdata('adminPassword') == "")
			{
				return redirect('Admin/Index');
			}
			else
			{
				$mediaName = $this->input->post('media-name');

				$entryId = $this->GetAdminAllInfo()->Id;

				// Copy Image and Get Image New Name
				$config['upload_path'] = "images/media_logo/";
				$config['allowed_types'] = "jpg|jpeg|png|gif";
				$this->load->library('upload',$config);

				$mediaImage = $_FILES['media-image']['name'];

				if ($mediaImage == "")
				{
					$msg = "Error! Image Uplod";
					return redirect('MediaName/MediaName',$msg);
				}
				else
				{
					$extention = pathinfo($mediaImage, PATHINFO_EXTENSION);
					$slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '_', $mediaName));
					$imageName = $config['upload_path'].$slug."_".date('ymds').".".$extention;

					copy($_FILES['media-image']['tmp_name'],$imageName);
				}

				$result = $this->MediaNameModel->CreateMediaName($mediaName,$imageName,$entryId);

				if ($result)
				{
					return redirect('MediaName/MediaName/1');
				}
				else
				{
					return redirect('MediaName/MediaName/2');
				}
			}
		}

		// function GetMediaNameAllInfo()
		// {
		// 	$output = '';
		// 	$searchText = '';
		// 	$sl = 1;

		// 	if ($this->input->post('searchText'))
		// 	{
		// 		$searchText = $this->input->post('searchText');
		// 	}

		// 	$data = $this->MediaNameModel->GetMediaNameAllInfo($searchText);

		// 	$output .='
		// 		<table class="table table-striped table-bordered">
		// 			<thead>
		// 				<tr>
		// 					<th>Sl</th>
		// 					<th>Name</th>
		// 					<th>Image</th>
		// 					<th>Action</th>
		// 				</tr>
		// 			</thead>

		// 			<tbody>
		// 	';

		// 	if ($data == "")
		// 	{
		// 		$output .= '<tr>';
		// 		$output .= '<td colspan="4" class="error-message">';
		// 		$output .= 'Oops! Sorry, No Data Found...';
		// 		$output .= '</td>';
		// 		$output .= '</tr>';
		// 	}
		// 	else
		// 	{
		// 		foreach ($data as $value)
		// 		{
		// 			$output .= '<tr>';
		// 			$output .= '<td>'.$sl.'</td>';
		// 			$output .= '<td>'.$value->Name.'</td>';
		// 			$output .= '<td><img src="'.base_url().$value->Image.'" width="80px" height="80px"></td>';
		// 			$output .= '<td><a href="'.base_url('index.php/MediaName/Edit/').$value->Id.'" class="btn btn-info">Edit</a> <a href="'.base_url('index.php/MediaName/Delete/').$value->Id.'" class="btn btn-danger">Delete</a></td>';
		// 			$output .= '</tr>';
		// 			$sl++;
		// 		}
		// 	}

		// 	$output .= '
		// 			</tbody>
		// 		</table>
		// 	';

		// 	echo $output;
		// }

		function GetMediaNameAllInfo()
		{
			$mediaInfo = '';
			$sl = 1;

			$config['base_url'] = '#';
			$config['total_rows'] = $this->MediaNameModel->CountRows();
			$config['per_page'] = 2;
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination pagination-centered">';
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

			$data = $this->MediaNameModel->GetMediaNameAllInfo($config['per_page'],$start);

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

		public function Edit($mediaNameId)
		{
			$this->MediaNameModel->Edit($mediaNameId);
		}

		public function Delete($mediaNameId)
		{
			$this->MediaNameModel->Delete($mediaNameId);
		}
	}
?>