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

    public function index()
    {
        $workhistories = UserWorkHistoryModel::all();
        $data = array('work_histories' => $workhistories);
        $this->render('index', $data);
    }

    public function show()
    {
        $id = $_GET['id'];
        $workhistory = UserWorkHistoryModel::find($id);
        $data = array('work_history' => $workhistory);
        $this->render('show', $data);
    }
}