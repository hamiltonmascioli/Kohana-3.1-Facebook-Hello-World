<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Hops Model: database calls
 *
 * @author Jason Hamilton-Mascioli
 * @package default
 * @version 1.0
 */

class Model_Hops extends Model_Database
{

  /**
   * Insert FB info into DB
   * @param string $email - unique email to insert
   * @param json $data
   * @return boolean
   */

    public function insert($email,$data)
    { 

      try
       {
         DB::insert('userdata', array('email','data'))
         ->values(array($email, $data))
         ->execute();
         
         return true;
       }
       catch( Database_Exception $e )
       {
          //echo $e->getMessage();        
          return false;
       }
    }

    /**
     * Update FB info into DB if email already exists in DB
     * @param string $email - unique email address
     * @param json $class
     * @return boolean
     */

    public function update($email,$data)
    {            
        try 
         {
             $total_rows = DB::update('userdata')->set(array('data'=>$data))
                     ->where('email','=',$email)->execute();

             return true;

         }
         catch( Database_Exception $e )
         {
             //echo $e->getMessage();
             return false;
         }

    }

    /**
     * Read the DB for the current user
     * @param string $email - lookup email for existance
     * @return array
     */

    public function read($email)
    {            
        try 
          {
            $user = DB::select()->from('userdata')
                    ->where('email','=',$email)
                    ->execute()->current();

                  return $user;
          }
          catch( Database_Exception $e )
          {
                  return false;
          }

        }
}