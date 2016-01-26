<?php

class Controller_Form2 extends Controller 
{

    //入力フォームで取り扱うフィールドを配列として設定
    //name:ユーザ名、email:メールアドレス、password:パスワード、password2:パスワード(確認用)
    private $fields = array('name', 'email', 'password', 'password2');
    
    public function action_index()
    {
        
        return Response::forge(View::forge('form2'));
        //フォームのsubmitボタンが押されたとき
        //if (Input::post('submit')){ 
            
            //postされた各データをフラッシュセッションに保存
        //  foreach ($this->fields as $field){
        //      Session::set_flash($field, Input::post($field));
        //  }
            
        //}  
        
        //入力チェックのためのvalidationオブジェクトを呼び出す
        //$val = Validation::forge();
        
        //各項目に対して、入力の検証ルールを設定
        //$val->add_field('name', 'ユーザ名', 'required');
        //$val->add_field('email', 'メールアドレス', 'required|valid_email');
        //$val->add_field('password', 'パスワード', 'required|min_length[8]|max_length[12]');
        //$val->add_field('password2', 'パスワード(確認用)', 'required|match_field[password]');
        //$out = '';
        //if ($val->run()){
        //    $out = '正しい入力です';
        //}else{
        //   foreach ($val->error() as $error) {    
        //        $out .= $error . '<br>';
        //    }
        //}
        
        //ビューに渡すデータの配列
        //$data = array();

        //validationオブジェクトを配列に保存
        //$data['val'] = $val;
        
        //$dataをビューに埋め込み、ビューを表示
        //return Response::forge('form2', $data);
    }
    
    public function action_confirm()
    {
      $val = Validation::forge();
      $val->add_field('name', 'ユーザ名', 'required');
      $val->add_field('email', 'メールアドレス', 'required|valid_email');
      $val->add_field('password', 'パスワード', 'required|min_length[8]|max_length[12]');
      $val->add_field('password2', 'パスワード(確認用)', 'required|match_field[password]');
      $out = '';

      $data = array();

      if ($val->run()){
          //$out = '正しい入力です';
          
          return View::forge('members/index');
      }else{
          foreach ($val->error() as $error) {
              $out .= $error . '<br>';
          }
      }
      return Response::forge($out);
    }
    
}