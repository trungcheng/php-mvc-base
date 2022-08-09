<?php

class Controllers
{
    public $host_name = "http://php-mvc-base.local";
    public $base_api_external = "http://localhost:5000";
    public $api_uc002;
    public $api_uc010;
    public $api_uc010_update_history;
    public $api_uc010_summary;
    public $api_uc013temp;

    public function __construct()
    {
        $this->api_uc002 = $this->host_name . "/API/api-quanlynhanvien-uc2/api_uc002";
        $this->api_uc010 = $this->base_api_external . "/api/uc10";
        $this->api_uc010_update_history = $this->host_name . "/uc010/update_leave_history";
        $this->api_uc010_summary = $this->host_name . "/uc010/get_data_summaries";
        $this->api_uc013temp = "";
    }

    protected function model($model)
    {
        require_once "./src/models/" . $model . ".php";

        return new $model;
    }

    protected function view($template, $view, $data = [])
    {
        $host_name = $this->host_name;
        $api_uc002 = $this->api_uc002;
        $api_uc010 = $this->api_uc010;
        $api_uc010_update_history = $this->api_uc010_update_history;
        $api_uc010_summary = $this->api_uc010_summary;

        require_once "./src/views/template/" . $template . ".php";
    }
}

?>