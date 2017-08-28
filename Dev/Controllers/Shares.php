<?php
class Shares extends Controller{
    protected function Index(){
     $viewmodel = new SharesModel();
     $this->returnview($viewmodel->Index(), true);
    }
    
    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
         header("Location: ". ROOT_PATH . '/users/login');
            
        }
        $viewmodel = new SharesModel();
        $this->returnview($viewmodel->add(), true);
    }
}