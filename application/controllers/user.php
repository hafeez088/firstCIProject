<?php 

class User extends CI_Controller {

	public function index(){
	$this->load->helper('form');
   $this->load->model('datamodel','publicmodel');
   $this->load->library('pagination');
		$config = [
                  'base_url'          => base_url('user/index'),
                  'per_page'          => 2,
                  'total_rows'        => $this->publicmodel->all_articles_rows(),
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
	 $data = $this->publicmodel->all_blogdata( $config['per_page'], $this->uri->segment(3) );
	 $this->load->view('public/home',compact('data'));  
	}
	public function search(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('searchdata','Search KeyWords','required|alpha');
		if ( ! $this->form_validation->run() ) 
			return $this->index();
				$query = $this->input->post();
			$this->load->model('datamodel','searchdata');
			$articles = $this->searchdata->search_data($query);
			//print_r($articles); exit();
			$this->load->view('public/result',compact('articles'));
		
        //unset($sdata['submit']);	
        //print_r($sdata);
	}
	public function article( $id ){
		$this->load->helper('form');
		$this->load->model('datamodel','blog_detail');
		$article = $this->blog_detail->find( $id );
		$this->load->view('public/article_detail',compact('article'));
	}
}

?>