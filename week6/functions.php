<?php
/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function getDatabase() {
    
        /* PHP script runs local or remote. Database server remote */
        /* 
            *********************************************************************************
            BE SURE TO CHANGE THIS TO USE YOUR OWN dbname, user name and password! 
                
                dbname: se266_[firstname]
                DB_USER:  se266_[firstname]
	            DB_PASSWORD: studentidwithoutleadingzeroes
            	
           *********************************************************************************    
        */
        $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_kasey;',
            'DB_USER' => 'se266_kasey',
            'DB_PASSWORD' => '8001137'
        );
        
        
         /* PHP script runs local. Database Server local */
       /*
        $config = array(
            'DB_DNS' => 'mysql:host=192.168.10.10;port=3306;dbname=se266_erik;',
            'DB_USER' => 'homestead',
            'DB_PASSWORD' => 'secret'
        );
        */
        /* Create a Database connection and save it into the variable */
        
        try {
            $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $db = null;
        }
        
    return $db;
}


function addProject($project_name) {
       
        $results = '';
          
        if (isPostRequest()) {
            
             global $db;
              
            $db = getDatabase();
            $stmt = $db->prepare("INSERT INTO project SET project_name = :project_name");
            $project_name = filter_input(INPUT_POST, 'project_name');
            
            $binds = array(
                ":project_name" => $project_name,
            );
            
            /*
             * empty()
             * isset()
             */
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Successfully added project';
            }
        }
        
        return ($results);
}

function getProjects () {
       $results = '';
       
        global $db;
       
       $db = getDatabase();
        /*
         * create a variable to hold the database
         * SQL statement
         */
        $stmt = $db->prepare("SELECT id, project_name FROM se266_kasey.project;");
        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return ($results);
}


?>