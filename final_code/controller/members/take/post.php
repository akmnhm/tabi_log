<?php
class Controller_Members_Take_Post
{

   public function action_bypref($pref_num)
   {



   }

   public function action_index($pid)
   {
     $data = array();
     $data['post'] = Model_Members_General::getPost($pid);
     $data['post'] = Model_Members_General::getPrefname($pid);

     

   }


   public function router($method_name, $uri_params)
   {

   // members/take/post/pref/0 => hokkaido for members/result
   // members/take/post/0 => pid=0 for membes/poslookup

   try {
     $action = $method_name;
     $code = array_shift($uri_params);
     $method = 'action_'.$action;

     if (method_exists($this, $method)) {
        $this->$method($code);
      } else {
        $this->action_index($code);
      }

   } (exception $e) {
      Response::redirect("members/top");
   }

   }
}

?>