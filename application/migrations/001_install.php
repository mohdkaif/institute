<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install extends CI_Migration {
   
	public function up()
    {
        $this->_table_batches(); 			//DONE
	    $this->_table_certificates();
		$this->_table_courses();
		$this->_table_course_category();
		$this->_table_course_fee();
		$this->_table_enquires_status();
		$this->_table_enquiries();
		$this->_table_expanses();
		$this->_table_expanses_category();
		$this->_table_faculty_receipt();
        $this->_table_files();
		$this->_table_inventory();
		$this->_table_study_material();
        $this->_table_notes();
		$this->_table_projects();
		$this->_table_receipts();
		$this->_table_rel_student_batch();
		$this->_table_settings();
		$this->_table_todo();
		$this->_table_users();
	}
    
    public function down()
    {
        // Migration 1 has no rollback 
    }
    
	
	private function _table_batches()
    {
        if(!$this->db->table_exists('batches'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            ),
				'category_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'course_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'duration' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),			
				'fees' => array(
                          'type' => 'decimal(10,2)',
                            'null' => true,
                            ),
				'description' => array(
                            'type' => 'text',
                            'null' => true,
                            ),
				'batch_time' => array(
                            'type' => 'time',
                            'null' => true,
                              ),
				'start_date' => array(
                            'type' => 'date',
                            'null' => true,
                              ),
				'end_date' => array(
                            'type' => 'date',
                            'null' => true,
                              ),
				'faculty_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'agreed_fee' => array(
                          'type' => 'decimal(10,2)',
                            'null' => true,
                            ),
				'is_view' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
							'default' => 0,
                            'null' => true,
                            ),						
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('batches', true);

        }
    }
	
	private function _table_certificates()
    {
        if(!$this->db->table_exists('certificates'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'user_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
							'null' => true,
                            ),
				
				'file_name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
							),			
				'issued' => array(
                            'type' => 'date',
							'null' => true,
                              ),
				'added' => array(
                            'type' => 'timestamp',
							'null' => true,
                              ),			  
									
            ));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('certificates', true);

        }
    }
	
	
	
	private function _table_courses()
    {
        if(!$this->db->table_exists('courses'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'category_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'duration' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
							),	
				'duration_type' => array(
                            'type' => 'tinyint',
							'constraint' => 1,
							'null' => true,
                            ),							
				'fees' => array(
                          'type' => 'decimal(10,2)',
                            'null' => true,
                            ),
				'description' => array(
                            'type' => 'text',
							'null' => true,
                            ),												
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('courses', true);

        }
    }
	
	
	private function _table_course_category()
    {
        if(!$this->db->table_exists('course_category'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('course_category', true);

        }
    }
	
	private function _table_course_fee()
    {
        if(!$this->db->table_exists('course_fee'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'faculty_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'payout' => array(
                            'type' => 'tinyint',
							'constraint' => 1,
							'null' => true,
                            ),
				'salary' => array(
                          'type' => 'decimal(10,2)',
						  'null' => true,
                            ),
				'percent' => array(
                          'type' => 'decimal(10,2)',
						  'null' => true,
                            ),
				'courses' => array(
                            'type' => 'text',
							'null' => true,
                            ),
				'date' => array(
                            'type' => 'date',
                            'null' => true,
                            ),															
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('course_fee', true);

        }
    }
	
	
	private function _table_enquires_status()
    {
        if(!$this->db->table_exists('enquires_status'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('enquires_status', true);

        }
    }
	
	
	private function _table_enquiries()
    {
        if(!$this->db->table_exists('enquiries'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'date_time' => array(
                            'type' => 'timestamp',
							'null' => true,
                            ),		
				'name' => array(
                            'type' => 'varchar',
							'constraint' => 255,
							'null' => true,
                            ),	
				'mobile' => array(
                            'type' => 'int',
							'constraint' => 32,
							'null' => true,
                            ),		
				'preferred_time' => array(
                            'type' => 'time',
							'null' => true,
                            ),	
				'status' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),														
				'course_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
							),
				'gender' => array(
                            'type' => 'varchar',
							'constraint' => 32,
							'null' => true,
                            ),		
				'dob' => array(
                            'type' => 'date',
                            ),					
				'remark' => array(
                            'type' => 'text',
							'null' => true,
                            ),
				'handeled_by' => array(
                          'type' => 'varchar',
						  'constraint' => 255,
						  'null' => true,
                            ),
				'admitted' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
							'default' => 0,
                            ),																
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('enquiries', true);

        }
    }
	
	private function _table_expanses()
    {
        if(!$this->db->table_exists('expanses'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'date' => array(
                            'type' => 'date',
                            'null' => true,
							),
				'title' => array(
                            'type' => 'varchar',
							'constraint' => 255,
                            'null' => true,
							),	
				'description' => array(
                            'type' => 'text',
                            'null' => true,
						   ),		
				'amount' => array(
                           'type' => 'decimal(10,2)',
                            'null' => true,
							 ),	
				'payment_method' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
                            'null' => true,
                            ),
				'status' => array(  			// 1 for paid
                            'type' => 'tinyint',
                            'constraint' => 1,
                            'default' => 0,
                            ),																		
				'category_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'null' => true,
                            ),
																		
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('expanses', true);

        }
    }
	
	
	private function _table_expanses_category()
    {
        if(!$this->db->table_exists('expanses_category'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('expanses_category', true);

        }
    }
	
	private function _table_faculty_receipt()
    {
        if(!$this->db->table_exists('faculty_receipt'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'receipt_no' => array(
                            'type' => 'int',
                            'constraint' => 11,
                            'null' => true,
                            ),
				'user_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'batch_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'amount' => array(
                           'type' => 'decimal(10,2)',
                            'null' => true,
                            ),
				'payment_method' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
                            'default' => 0,
							),
				'remark' => array(
                            'type' => 'text',
                            'null' => true,
                            ),		
				'date' => array(
                            'type' => 'date',
                            'null' => true,
                            ),	'added TIMESTAMP DEFAULT CURRENT_TIMESTAMP',													
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('faculty_receipt', true);

        }
    }
	
	private function _table_files()
    {
        if(!$this->db->table_exists('files'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'file_name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),			
				'user_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
				'uploaded_by' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),			
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('files', true);

        }
    }
	
	private function _table_inventory()
    {
        if(!$this->db->table_exists('inventory'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'description' => array(
                            'type' => 'text',
                            'null' => true,
                            ),	
				'price' => array(
                           'type' => 'decimal(10,2)',
                            'null' => true,
                            ),					
				'qty' => array(  
                            'type' => 'int',
                            'constraint' => 11,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
				'updated' => array(  
                            'type' => 'timestamp',
                            'null' => true,
                            ),			
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('inventory', true);

        }
    }
	
	private function _table_study_material()
    {
        if(!$this->db->table_exists('study_material'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'course_id' => array(  
                            'type' => 'int',
                            'constraint' => 11,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'file_name' => array(
                            'type' => 'text',
                            'null' => true,
                            ),	
						
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('study_material', true);

        }
    }
	
	private function _table_notes()
    {
        if(!$this->db->table_exists('notes'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'notes' => array(
                            'type' => 'text',
                            'null' => true,
                            ),	
				'user_id' => array(  
                            'type' => 'int',
                            'constraint' => 11,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'posted_by' => array(  
                            'type' => 'int',
                            'constraint' => 11,
                            'unsigned' => true,
                            'default' => 0,
                            ),			
				'added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
		
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('notes', true);

        }
    }
	
	private function _table_projects()
    {
        if(!$this->db->table_exists('projects'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'site' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),	
				'description' => array(
                            'type' => 'text',
                            'null' => true,
                            ),						
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('projects', true);

        }
    }
	
	private function _table_receipts()
    {
        if(!$this->db->table_exists('receipts'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'receipt_no' => array(
                            'type' => 'int',
                            'constraint' => 11,
                            'null' => true,
                            ),
				'user_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'course_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),			
				'batch_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'amount' => array(
                           'type' => 'decimal(10,2)',
                            'null' => true,
                            ),
				'payment_method' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
                            'default' => 0,
							),
				'remark' => array(
                            'type' => 'text',
                            'null' => true,
                            ),		
				'date' => array(
                            'type' => 'date',
                            'null' => true,
                            ),	'added TIMESTAMP DEFAULT CURRENT_TIMESTAMP',													
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('receipts', true);

        }
    }
	
	
	private function _table_rel_student_batch()
    {
        if(!$this->db->table_exists('rel_student_batch'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'student_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),
				'course_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),			
				'batch_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),
				'added' => array(
                           'type' => 'date',
                            'null' => true,
                            ),										
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('rel_student_batch', true);

        }
    }
	
	private function _table_settings()
    {
        if(!$this->db->table_exists('settings'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'name' => array(  
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'logo' => array(  
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'phone' => array(  
                            'type' => 'varchar',
                            'constraint' => 32,
                            'null' => true,
                            ),
				'email' => array(  
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'address' => array(  
                            'type' => 'text',
                            'null' => true,
                            ),												
				'registration_no' => array(  
                            'type' => 'int',
                            'constraint' => 11,
                            'unsigned' => true,
							'default' => 1,
                            ),
				'receipt_no' => array(  
                            'type' => 'int',
                            'constraint' => 11,
                            'unsigned' => true,
							'default' => 1,
                            ),			
				'faculty_receipt_no' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 1,
							),
				'batch_alert' => array(  
                            'type' => 'tinyint',
                            'constraint' => 4,
                            'default' => 1,
                            ),													
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('settings', true);
			
			$records = array('id'=>'1','name'=>'IOMS');

            $this->db->insert('settings', $records);
        }
    }
	
	private function _table_todo()
    {
        if(!$this->db->table_exists('todo'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'title' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'status' => array(  
                            'type' => 'tinyint',
                            'constraint' => 1,
                            'default' => 0,
                            ),
				'description' => array(
                            'type' => 'text',
                            'null' => true,
							),
				'date' => array(
                            'type' => 'date',
                            'null' => true,
                            ), 'timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP',							
				
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('todo', true);

        }
    }
	
	private function _table_users()
    {
        if(!$this->db->table_exists('users'))
        {

            // create the table
            $this->dbforge->add_field(array(
                'id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'auto_increment' => true
                            ),
				'registration' => array(
                            'type' => 'tinyint',
                            'constraint' => 1,
							'default' => 0,
                            ),
				'enquiry_id' => array(  
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'null' => true
                            ),			
				'name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'gardian_name' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),	
				'gardian_mobile' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),
				'username' => array(
                            'type' => 'varchar',
                            'constraint' => 32,
                            'null' => true,
                            ),
				'email' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),												
				'password' => array(
                            'type' => 'varchar',
                            'constraint' => 40,
                            'null' => true,
                            ),
				'mobile' => array(
                            'type' => 'varchar',
                            'constraint' => 32,
                            'null' => true,
                            ),
				'fname' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),			
				'gender' => array(
                            'type' => 'varchar',
                            'constraint' => 32,
                            'null' => true,
                            ),		
				'dob' => array(
                            'type' => 'date',
                            'null' => true,
                            ),	
				'image' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),	
				'current_address' => array(
                            'type' => 'text',
                            'null' => true,
                            ),	
				'highest_quali' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),	
				'year_of_exp' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),				
				'join_date' => array(
                            'type' => 'date',
                            'null' => true,
                            ),				
				'join_as' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
                            'null' => true,
                            ),				
				'courses' => array(
                            'type' => 'text',
                            'null' => true,
                            ),
				'user_role' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            ),		
				'registration_no' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
							'default' => 0,
                            ),			
				'course_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),			
				'batch_id' => array(
                            'type' => 'int',
                            'constraint' => 10,
                            'unsigned' => true,
                            'default' => 0,
                            ),			
				'added' => array(
                            'type' => 'date',
                            'null' => true,
                            ),
				'token' => array(
                            'type' => 'varchar',
                            'constraint' => 255,
							'null' => true,
                            ),																																																								
			));

            $this->dbforge->add_key('id', true);
            $this->dbforge->create_table('users', true);
        }
    }
}