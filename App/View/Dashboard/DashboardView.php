<?php

namespace App\View\Dashboard;

define('SCRIPT_ROOT', 'http://localhost/hackathon');

class DashboardView {

    public static function render() {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT ?>/public/css/style.css">
            <link rel="stylesheet" type="text/css" href="<?php echo SCRIPT_ROOT ?>/public/css/reset.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>

        <div class="main">

            <body>

                <div class="sidebar">
                    <ul>
                        <li class="logo">
                            <img src="<?php echo SCRIPT_ROOT ?>/public/images/logo.png">
                        </li>
                        <li>
                            <legend>User Tools</legend>
                        </li>
                        <li><a href="#">
                                <i class="fa-solid fa-table-cells-large"></i>
                                <p>Overview</p>
                            </a></li>
                        <li><a href="#">
                                <i class="fa-solid fa-users"></i>
                                <p>Users</p>
                            </a></li>
                        <li><a href="#">
                                <i class="fa-regular fa-circle-play"></i>
                                <p>Videos</p>
                            </a></li>

                        <li><a href="#">
                                <i class="fa-regular fa-flag"></i>
                                <p>Reports</p>
                            </a></li>
                        <li><a href="#">
                                <i class="fa-solid fa-gear"></i>
                                <p>Setting</p>
                            </a></li>
                        <li class="Logout"><a href="./logout">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                <p>Logout</p>
                            </a></li>

                    </ul>
                </div>
                <div class="navbar">
                    <input type="search" placeholder="Search Users...">
                    <div class="menu">
                        <img class="profile" src="<?php echo SCRIPT_ROOT ?>/public/images/profile.png">
                        <h2><?= ucfirst($_SESSION['full_name']) ?></h2>
                    </div>
                </div>


            </body>
        </div>

        </html>
<?php
    }
}
