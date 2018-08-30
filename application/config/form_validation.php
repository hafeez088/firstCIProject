<?php

$config = [

         'datavalidation' => [
                                         [
                                         	 'field' => 'title',
						                     'label' => 'Add Title',
						                     'rules' => 'required|alpha',
                                         ],
                                         [
	                                          'field' => 'feedback',
							                  'label' => 'Add Feedback',
							                  'rules' => 'required',
                                         ]
                                                 	
                             ],
       'login_validation' => [
                                         [
                                         	 'field' => 'username',
						                     'label' => 'Add username',
						                     'rules' => 'required|alpha'
                                         ],
                                         [
	                                          'field' => 'password',
							                  'label' => 'Add password',
							                  'rules' => 'required|max_length[12]',
                                         ]
                                                 	
                             ]
          ];

?>