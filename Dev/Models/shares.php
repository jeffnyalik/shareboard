<?php
class SharesModel extends Model{
    public function Index(){
        // query the database
        $this->query("SELECT * FROM  shares order by create_date desc");
        $rows = $this->resultSet();
        return $rows;

    }
    public function add(){
        // sanitize our form
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']){
            // insert into the databaseif($post['submit']){
            if($post['title'] == '' || $post['body'] == '' || $post['link'] == ''){
                Messages::setMsg("all fields are required", "error");
                return;
            }

            $this->query("INSERT INTO shares(title, body, link, user_id) VALUES(:title, :body, :link, :user_id)");
            $this->bind(':title', $post['title']);
            $this->bind(':body',  $post['body']);
            $this->bind(':link',  $post['link']);
            $this->bind(':user_id', 1);
            $this->execute();

            // check if the data has been added to the database
            if($this->lastId()){
                header("Location: ".ROOT_PATH. './shares');
            }
        }
        return;
    }
}