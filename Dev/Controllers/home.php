<?php
class Home extends Controller{
    protected function Index(){
        $viewmodel = new HomeModels();
        $this->ReturnView($viewmodel->Index(), true);
    }
}