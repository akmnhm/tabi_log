<?php
class Controller_Members_Entrypost extends \Controller_Hybrid
{
  
    public $template = null;
  
    public function action_index()
    {
        return new Response(View::forge('members/entrypost', array()));
    }
  
    public function post_validation()
    {
        // json初期値
        $json = array(
            'res'   => 'NG',
            'error' => array(),
        );
 
        // バリデーション設定
        $val = Validation::forge();
        $val->add_field('name', '氏名', 'required|max_length[100]');
        $val->add_field('email', 'メールアドレス', 'required|valid_email');
        $val->add_field('gender', '性別', 'required|max_length[2]');
 
        // バリデーションチェック
        if ( $val->run() )
        {
            $json['res'] = 'OK';
        }
        else
        {
            $errors = $val->error();
            foreach( $errors as $field => $error )
            {
                $json['error'][$field] = $error->get_message();
            }
        }
          
        $this->response($json);
    }
}