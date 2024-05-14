<?php

namespace App\Controller;


use App\View\Dashboard\DashboardView;

class DashboardController {
    public function index() {
        if (!isset($_SESSION['full_name'])) {
            header('Location: ./login');
        }
        DashboardView::render();
    }
}
