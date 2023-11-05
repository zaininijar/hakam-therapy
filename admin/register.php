<?php

require_once '../connection.php';

session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');

    exit;
}

$query = "SELECT * FROM therapy_register";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:8080/dist/css/output.css">
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
                    <a class="block text-emerald-800 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-300 hover:text-white"
                        href="admin.php">
                        <i class="fas fa-home mr-2"></i>Semua
                    </a>
                    <a class="block  py-2.5 px-4 my-4 rounded transition duration-200 bg-gradient-to-r from-emerald-600 to-emerald-300 text-white"
                        href="register.php">
                        <i class="fas fa-file-alt mr-2"></i>Pendaftaran
                    </a>
                    <a class="block text-emerald-800 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-300 hover:text-white"
                        href="after.php">
                        <i class="fas fa-users mr-2"></i>Sesudah
                    </a>
                </nav>

                <a class="block text-emerald-800 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-300 hover:text-white mt-auto"
                    href="logout.php">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </a>
            </div>

            <div class="flex-1 p-4 w-full md:w-1/2">
                <div class="mt-8 bg-white p-4 shadow rounded-lg">
                    <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <h2 class="text-emerald-500 text-lg font-semibold pb-4">Data Pendaftaran Therapy</h2>
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-emerald-100 border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                                Nama
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                                Alamat
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                                Desa
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                                Kecamatan
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                                Kota/Kabupaten
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                                Whatsapp
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                                Time Created
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($result as $key => $row): ?>
                                        <tr
                                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
                                                <?= $key + 1 ?>
                                            </td>
                                            <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?= $row['name'] ?>
                                            </td>
                                            <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?= $row['address'] ?>
                                            </td>
                                            <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?= $row['village'] ?>
                                            </td>
                                            <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?= $row['subdistrict'] ?>
                                            </td>
                                            <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?= $row['city'] ?>
                                            </td>
                                            <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?= $row['whatsapp'] ?>
                                            </td>
                                            <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                                <?= $row['created_at'] ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
    const menuBtn = document.getElementById('menuBtn');
    const sideNav = document.getElementById('sideNav');

    menuBtn.addEventListener('click', () => {
        sideNav.classList.toggle(
            'hidden');
    });
    </script>
</body>

</html>