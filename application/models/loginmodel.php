<?php

class Loginmodel extends CI_Model {

	public function login_valid( $username , $password ) {
     
     $q = $this->db->where(['username'=>$username,'password'=>$password])
                        ->get('masterlogin');
                        if ( $q->num_rows() ) {
                        	return $q->row()->lid;
                        }else{
                            return FALSE;
                        }

					}

				}

?>