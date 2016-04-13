<?php
/**
 * Created by PhpStorm.
 * User: vlada
 * Date: 13.4.16.
 * Time: 09.53
 * Desc: class for authentication of users
 */
class Auth{
    public $user;
    public $password;
    public $success_url;
    public $fail_url;
    protected $status;
    protected $id;
    protected $role;

    public function __construct()
    {
        $q = new Query();
        $q->table = 'users';
        $q->where = array('email'=>$this->user,'password'=>md5($this->password));
        $res = $q->read();
        if(count($res)>0){
            $this->status = true;
            $this->role = $res[0]['role'];
            $this->id = $res[0]['id'];
        }else{
            $this->status = false;
        }
    }
    public function redirect(){
        if($this->status){
            session_start();
            session_regenerate_id();
            $_SESSION['USER_ID'] = $this->id;
            $_SESSION['USER_ROLE'] = $this->role;

            header('Location: '.$this->success_url);
        }else{
            header('Location: '.$this->fail_url);
        }
    }
}
