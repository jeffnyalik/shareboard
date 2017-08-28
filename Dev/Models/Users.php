<?php
class UsersModel extends Model{
    public function register(){
        // sanitize our form
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);
        if($post['submit']){
            if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
                Messages::setMsg("all fields are required", "error");
                return;
            }
            // insert the data into the database
            $this->query("INSERT INTO users(name, email, password) VALUES(:name, :email, :password) ");
            $this->bind(":name",        $post['name']);
            $this->bind(":email",       $post['email']);
            $this->bind(":password",    $password);
            $this->execute();
            if($this->lastId()){
                header("Location: ".    ROOT_PATH. './users/login');
            }
        }
         return;
    }
    public function login(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);
        if($post['submit']){
            $this->query("SELECT email, password FROM users WHERE email=:email AND password=:password");
            $this->bind(':email',     $post['email']);
            $this->bind(':password',  $password);

            $row = $this->single();
            if($row){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"     => $row['id'],
                    "name"   => $row['name'],
                    "email"  => $row['email']
                );
                echo '<div class="alert alert-success">'."Thank you".'</div>';
                header('Location: '. ROOT_PATH.'./shares');
            }else{
                // echo '<div class="alert alert-danger">'."invalid username or password".'</div>';
                Messages::setMsg("invalid username or password", "error");
            }
            
        }
        return;
    }
    public function logout(){
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();

        // redirect to the home page
        header("Location: ". ROOT_PATH. './');
    }
}