<?php
$base_url = "http://localhost:8080/";
?>


<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base_url ?>/dist/css/output.css">
    <title>Admin | Hakam Therapy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="flex flex-col h-screen bg-gray-100">
        <div class="bg-white shadow w-full md:px-8 px-4 py-6 flex  items-center justify-between">
            <div class="flex items-center justify-between w-full">
                <div class="flex items-center">
                    <h2 class="font-bold text-xl">Hakam <span class="text-emerald-600">Therapy</span></h2>
                </div>
                <div class="md:hidden flex items-center">
                    <button id="menuBtn">
                        <i class="fas fa-bars text-gray-500 text-lg"></i>
                    </button>
                </div>
            </div>

            <div class="hidden md:flex gap-4 items-center">
                <button>
                    <i class="fas fa-bell text-emerald-800 text-lg"></i>
                </button>
                <button>
                    <i class="fas fa-user text-emerald-800 text-lg"></i>
                </button>
            </div>
        </div>

        <div class="flex-1 flex flex-wrap ">
            <div class="p-2 bg-gradient-to-tr shadow-sm shadow-gray-300 from-emerald-300 to-emerald-50 w-full md:w-60 flex-col md:flex hidden"
                id="sideNav">
                <nav>
                    <a class="<?php print($_SERVER['REQUEST_URI'] === '/admin/admin.php') ? '__sidebar-link-active' : '__sidebar-link'; ?>"
                        href="<?= $base_url . 'admin/admin.php' ?>">
                        <i class="fas fa-home mr-2"></i>Semua
                    </a>
                    <a class="<?php print($_SERVER['REQUEST_URI'] === '/admin/register.php') ? '__sidebar-link-active' : '__sidebar-link'; ?>"
                        href="<?= $base_url . 'admin/register.php' ?>">
                        <i class="fas fa-file-alt mr-2"></i>Pendaftaran
                    </a>
                    <a class="<?php print($_SERVER['REQUEST_URI'] === '/admin/after.php') ? '__sidebar-link-active' : '__sidebar-link'; ?>"
                        href="<?= $base_url . 'admin/after.php' ?>">
                        <i class="fas fa-users mr-2"></i>Sesudah
                    </a>
                </nav>

                <a class="block text-emerald-800 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-300 hover:text-white mt-auto"
                    href="<?= $base_url . 'admin/logout.php' ?>">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </a>
            </div>