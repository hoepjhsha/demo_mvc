<?php

namespace controllers;

use abstracts\BaseController;
use models\UserWorkHistoryModel;

class UserWorkHistoriesController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'work_histories';
    }

    // hiển thị view 'home' trong thư mục 'pages'
    public function index()
    {
        // lấy tất cả các lịch sử làm việc của người dùng
        $workhistories = UserWorkHistoryModel::all();
        // truyền dữ liệu sang view 'index'
        $data = array('work_histories' => $workhistories);
        // gọi hàm render để hiển thị view 'index' với dữ liệu truyền sang
        $this->render('index', $data);
    }

    public function show()
    {
        // lấy ID của lịch sử làm việc từ URL
        $id = $_GET['id'];
        // tìm lịch sử làm việc theo ID
        $workhistory = UserWorkHistoryModel::find($id);
        // truyền dữ liệu sang view 'show'
        $data = array('work_history' => $workhistory);
        // gọi hàm render để hiển thị view 'show' với dữ liệu truyền sang
        $this->render('show', $data);
    }
}