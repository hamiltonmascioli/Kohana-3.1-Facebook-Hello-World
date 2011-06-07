<?php
/**
 * Hops controller: load app and run logic here
 *
 * @author Jason Hamilton-Mascioli
 * @package default
 * @version 1.0
 */

class Controller_Hops extends Controller {

  /**
   * Pull most current facebook configuration during run-time
   */

  public function before()
  {
       $this->data = array(); // init as a pre-caution
       $this->data['app_id'] = Kohana::config('Facebook.app_id'); // get fb id
       $this->data['secret'] = Kohana::config('Facebook.secret'); // get fb secret  
       
       // DEBUG
       //print_r(Session::instance('database')->as_array());                 
  }

  /**
   * Index and login page for app using fb JavaScript SDK
   * @return view object
   */

  public function action_index()
  {
      $view = View::factory('hops/home')
          ->bind('app_id', $this->data['app_id']);

      $this->response->body($view);
  }

  /**
   * Analyze page to log user in and connect to the database + save info + calculate score etc
   * @return view object
   */

  public function action_analyze()
  {

      // generate logged in status in session
      Session::instance('database')->set('status', 'connected');

      $view = View::factory('hops/analyze')
          ->bind('app_id', $this->data['app_id']);

      $this->response->body($view);
  }

  /**
   * Convert array values to lowercase
   * @param array $array
   * @param int $round
   * @return array
   */

  // convert array values to lowercase
  protected function arraytolower(array $array, $round = 0){
    return unserialize(strtolower(serialize($array)));
  }


  /**
   * Generate user dashboard
   * @return view object
   */

  public function action_dashboard()
  {

    // INIT HTML template variables from session or helpers
    $me = Session::instance('database')->get('userdata');
    //$score = Helper_Hopscore::getscore($me);

    $view = View::factory('hops/dashboard')
          ->bind('app_id', $this->data['app_id'])
          ->bind('me', $me);        

    $this->response->body($view);
  }

  /**
   * Save generated FB data to DB
   * @param array $attributes
   * @param string $class
   * @return array
   */
  
  public function action_results()
  {
    // Get FB Data
    Session::instance('database')->set('userdata', $_POST);

    $post = new Model_Hops();

    // Check if use exists
    $result = $post->read($_POST['email']);

    if(!$result)
      $post->insert($_POST['email'], json_encode($_POST)); // user does not exist, convert data to JSON format
    else
      $post->update($_POST['email'], json_encode($_POST)); // user exists, so UPDATE, convert data to JSON

    return print_r($_POST); // have the data available if required for existance of data with JS and debug if required

  }

  /**
   * Logout function
   * @return redirect
   */

  public function action_logout()
  {

    Session::instance('database')->set('status', 'offline');

    header("Location: /hops");
    exit;  
  }
}