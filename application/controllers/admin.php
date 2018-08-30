<?php
class Admin extends CI_Controller {

	public function dashboard(){
		$this->load->library('pagination');
		$config = [
                  'base_url'          => base_url('admin/dashboard'),
                  'per_page'          => 2,
                  'total_rows'        => $this->data->num_rows(),
                  'full_tag_open'     => "<ul class='pagination'>",
                  'full_tag_close'    => "</ul>",
                  'next_tag_open'     => "<li class='page-item'>",
                  'next_tag_close'    => "</li>",
                  'prev_tag_open'     => "<li class='page-item'>",
                  'prev_tag_close'    => "</li>",
                  'num_tag_open'      => "<li class='page-item'>",
                  'num_tag_close'     => "</li>",
                  'cur_tag_open'      => "<li class='page-item active'><a class='page-link'>",
                  'cur_tag_close'     => "</a></li>",
                  'attributes'        => ['class' => 'page-link'],

		];
        $this->pagination->initialize($config);
		$data = $this->data->blogdata( $config['per_page'], $this->uri->segment(3) );

		$this->load->view('admin/dashboard',['data'=>$data]);
		
	}
	
	public function add_articles(){
        $this->load->view('admin/addarticles');

	}
	public function store_data(){
		$config = [
			'upload_path' =>   './uploads',
			'allowed_types' => 'jpg|gif|png|jpeg',
		 ];
		$this->load->library('upload',$config);
		 $this->load->library('form_validation');
		//echo validation_errors(); 
		if ( $this->form_validation->run('datavalidation') && $this->upload->do_upload() ) {
                //echo 'ok';
			$post = $this->input->post();
			//print_r($post); die;
			$data = $this->upload->data();
			//print_r($data);exit;
			$image_path = base_url("uploads/".$data['raw_name'].$data['file_ext']);
			//echo $image_path; exit();
			$post['image_path'] = $image_path;
			$this->load->model('datamodel','insertdata');
			if ( $this->insertdata->add_articles($post) ) {
				//flash message successful
				$this->session->set_flashdata('feedback','Item Added Successfully');

			} else {
                $this->session->set_flashdata('feedback','Item Not Added,please Try Again');

			}
			return redirect('admin/dashboard');

		}else{
              $upload_error = $this->upload->display_errors();
              //echo validation_errors();
			return redirect('admin/add_articles',compact('upload_error'));
		}

	}
	public function edit_data($did){
		//echo $did; 
		$this->load->model('datamodel','editdata');
		$result = $this->editdata->find_articles($did);
		//print_r($result);
		$this->load->view('admin/edit_article',['results'=>$result]);              
	}
    public function update_article($uid){
         	 $this->load->library('form_validation');
		//echo validation_errors(); 
		if ( $this->form_validation->run('datavalidation') ) {
                //echo 'ok';
			$post = $this->input->post();
			unset($post['submit']);	
        $this->load->model('datamodel','updatedata');
			if ( $this->updatedata->update_articles($uid,$post) ) {
				//flash message successful
				$this->session->set_flashdata('feedback','Item Updated Successfully');

			} else {
                $this->session->set_flashdata('feedback','Item Not Updated,please Try Again');

			}
			return redirect('admin/dashboard');

		}else{
              
              //echo validation_errors();
			return redirect('admin/edit_data');
		}
    }
    public function delete_articles(){
               // echo 'delete data received';	
    	$did = $this->input->post('delete_id');
    	$this->load->model('datamodel','delete_data');
			if ( $this->delete_data->delete_articles($did) ) {
				//flash message successful
				$this->session->set_flashdata('feedback','Item Deleted Successfully');
				$this->session->set_flashdata('feedback_class','alert-danger');

			} else {
                $this->session->set_flashdata('feedback','Item Not Deleted,please Try Again');
                $this->session->set_flashdata('feedback_class','alert-danger');
			}
			return redirect('admin/dashboard');

    }


	public function __construct(){
		parent::__construct();
		if( ! $this->session->userdata('user_id') )
			return redirect('login');
       $this->load->helper('form');
       $this->load->model('datamodel','data');
	}
}

?>