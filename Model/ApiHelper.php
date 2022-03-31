<?php


class ApiHelper{

    private $method = "get";
    private $url;
    private $resource ; 
    private $resource_id;
    private $body_resource;
    public function __construct()
    {
        echo "hello";
        $this->method = $this->get_method();
        $this->read_resources();
        if($this->resource ==="" || $this->resource_id === -1)
        {
            $this->output(array("error"=> "resource or resource id doesnot exist"),404); 
        }
    }

    public function output($data,$response_code = 200)
    {
        http_response_code($response_code);
        header('Content-Type:application/json');
        echo json_encode($data);
    }

    public function get_method(){
        $allowed = array("get","post","put","delete");
        if (in_array(strtolower($_SERVER["REQUEST_METHOD"]),$allowed)){
            return strtolower($_SERVER["REQUEST_METHOD"]);
        }else{
            $this->output(array("error"=> "not supported method"),405); 
        }

    }

    private  function read_resources()
    {
        $this->url = $_SERVER["REQUEST_URI"];
        $pieces = explode("/",$this->url);
        $this->resource = (isset($pieces[6]) && $pieces[6] == "items")? $pieces[6]:""; 
        if (isset($pieces[7]))
        {
        $this->resource_id = is_numeric($pieces[7]) ? $pieces[7]:-1;
        }
    }


    public function get($table)
    {
        // $glass = $table->find()
        $this->output(array("data"=> $table),200);
    }
}