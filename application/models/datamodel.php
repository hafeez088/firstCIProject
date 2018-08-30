<?php
class Datamodel extends CI_Model {
	public function blogdata( $limit, $offset ){
     
     $user_id = $this->session->userdata('user_id');
     $query = $this->db
                      ->select('cid,user_id,name,feedback')
                      ->from('testimonial')
                      ->where( 'user_id',$user_id )
                      ->limit( $limit, $offset )
                      ->get();

      return $query->result();                
	}
	public function all_blogdata( $limit, $offset ){
     $query = $this->db
                      ->select('cid,user_id,name,feedback,created')
                      ->from('testimonial')
                      ->limit( $limit, $offset )
                      ->order_by('created','DESC')
                      ->get();

      return $query->result();                
	}
	public function all_articles_rows(){
		 $query = $this->db
                      ->select('cid,user_id,name,feedback')
                      ->from('testimonial')
                     // ->where( 'user_id',$user_id )
                      ->get();

      return $query->num_rows();    

	}
	public function num_rows(){
		$user_id = $this->session->userdata('user_id');
        $query = $this->db
                      ->select('cid,user_id,name,feedback')
                      ->from('testimonial')
                      ->where( 'user_id',$user_id )
                      ->get();

      return $query->num_rows();    

	}
	public function add_articles($array){
		$title = $array['title'];
		$feedback = $array['feedback'];
        $uid = $array['user_id'];
        $date = $array['created'];
        $path = $array['image_path'];
		return $this->db->insert('testimonial',['user_id'=>$uid,'name'=>$title,'feedback'=>$feedback,'created'=>$date,'image_path'=>$path]);

	}
	public function find_articles($did){
		 $query = $this->db
                      ->select('cid,name,feedback')
                      ->from('testimonial')
                      ->where( 'cid',$did )
                      ->get();

      return $query->row();

	}
	public function update_articles($did , array $data){
			$title = $data['title'];
			$feedback = $data['feedback'];

			return $this->db
			                 ->where('cid',$did)
			                 ->update('testimonial',['name'=>$title,'feedback'=>$feedback]);
	}
	public function delete_articles($article_id){
            return $this->db->delete('testimonial',['cid'=>$article_id]);     
	}
    public function search_data( $query ){
    	$sdata = $query['searchdata'];
    	$q = $this->db->from('testimonial')
    	                  ->like( 'name', $sdata )
    	                  ->get();
    	 return $q->result();                 

    }
    public function find( $id ){
    	$q = $this->db->from('testimonial')
    	             ->where('cid',$id)
    	             ->get();
    	     if($q->num_rows()){
    	     	return $q->row();
    	     	return false;
    	     }        

    }
	
}
?>