<?php

class uc010Controller extends Controllers
{
    public function middleware()
    {
        if (!isset($_SESSION['id'])) {
            header("Location: " . $this->host_name);
        }
    }

    public function index()
    {
        $this->middleware();
        $this->view("main", "UC010/index", []);
    }

    public function update_leave_history()
    {
        $postData = [
            'employee_id' => $_POST["employee_id"],
            'leave_typeid' => $_POST["leave_typeid"],
            'create_date' => $_POST["create_date"],
            'number_days' => $_POST["number_days"],
        ];

        $model = $this->model('leaveModel');

        $leaveHistory = $model->get_leave_history($postData);
        if (!empty($leaveHistory)) {
            $postData['used_day'] = $leaveHistory['USED_DAY'];
            $postData['remaining_day'] = $leaveHistory['REMAINING_DAY'];

            $response = $model->update_leave_history($postData);
            if ($response) {
                echo $this->response_data(200, "Update leave type history success", [], true);
                exit();
            }

            echo $this->response_data(500, "System has error", [], false);
            exit();
        }

        echo $this->response_data(404, "Leave history not found", [], false);
    }

    public function get_data_summaries()
    {
        $model = $this->model('leaveModel');

        $userId = $_SESSION['id'];
        $year = '2022';
        $data = $model->get_data_summaries($userId, $year);
        var_dump($data);die;

        echo $this->response_data(200, "Get all leave types success", $data, true);
    }

    public function response_data($status, $message, $data, $success)
    {
        $arr = [
            "status" => $status,
            "message" => $message,
            "data" => $data,
            "success" => $success,
        ];

        return json_encode($arr);
    }
}

?>