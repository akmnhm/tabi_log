<?php
class Controller_Members extends Controller
{
    public function action_index()
    {
        //すでにログイン済であればログイン後のページへリダイレクト
        Auth::check() and Response::redirect('members/top');
        //エラーメッセージ用変数初期化
        $error = null;
	//signup成功時のメッセージ
	$msg = null;
        //ログイン用のオブジェクト生成
        $auth = Auth::instance();
	
	$uname = Input::post('username', null);
	$pass = Input::post('password', null);	

	   if(isset($_POST['login'])) {
	        // login処理
		
		if ($auth->login(Input::post('username'), Input::post('password'))) 
          	            // ログイン成功時、ログイン後のページへリダイレクト
               		 Response::redirect('members/top');
        	  else
                            // ログイン失敗時、エラーメッセージ作成
                         $error = 'loginに失敗しました。ユーザ名かパスワードに誤りがあります';
            	

	   } elseif (isset($_POST['signup'])) {
	     	// signup処理

		$new_uname = $_POST['new_uname'];
		$new_pass = $_POST['new_pass'];

		try {
		 $icons = array("default1.jpg", "default2.jpg", "default3.jpg", "default4.jpg");
		 $count = count($icons);
		 $random = rand(0, $count -1);

		  Auth::create_user($new_uname, $new_pass, $new_uname."@tabi.com");
		  Model_Members_General2::setProfile($new_uname, $icons[$random]);
		  
       		 $msg = "signupに成功しました。loginして下さい。"; 

		 } catch (Exception $e) {
		   if ($new_uname != null && $new_pass != null) {
                         // signup失敗時、エラーメッセージ作成
                         $error = "signupに失敗しました。nameは半角英数字のみで、重複できません。";
            	    } else {
		         // signup記入漏れ時、エラーメッセージ作成
			 $error = "signに失敗しました。入力が不十分です。";
		    }

		 }		

	    }	          
	    
        //ビューテンプレートを呼び出し
        $view = View::forge('loginsignup');
        //エラーメッセージをビューにセット

        $view->set('error', $error);
	$view->set('msg', $msg);
        return $view;

	}
 
}