<?php

namespace controllers;

// Nạp class BaseController để dùng
use abstracts\BaseController;

class PagesController extends BaseController
{
    // Thiết lập thư mục chứa view cho trang này. ở đây là 'pages'
    public function __construct()
    {
        $this->folder = 'pages';
    }

    // Trang chủ: hiển thị view 'home' trong thư mục 'pages'
    public function home()
    {
        $this->render('home');
    }

    // Trang lỗi: hiển thị view 'error' trong thư mục 'pages'
    public function error()
    {
        $this->render('error');
    }
}