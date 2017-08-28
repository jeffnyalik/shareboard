<?php
class users extends Controller{
    protected function register(){
        $viewmodel = new usersModel();
        $this->returnView($viewmodel->register(), true);
    }
    protected function login(){
        $viewmodel = new usersModel();
        $this->returnview($viewmodel->login(), true);
    }
    protected function logout(){
        $viewmodel = new UsersModel();
        $this->returnview($viewmodel->logout(), true);  
    }
}