<?php require_once 'layouts/header.php' ?>

<?php

require_once '../connection.php';

session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');

    exit;
}
$after_query = "SELECT * FROM after_therapy";
$after_stmt = $conn->prepare($after_query);
$after_stmt->execute();

$after_result = $after_stmt->fetchAll();

?>



<div class="flex-1 p-4 w-full md:w-1/2">
    <?php if(isset($_SESSION['message_delete'])): ?>
    <div class="bg-emerald-500 w-full px-8 py-4 rounded text-white mb-8 flex justify-between items-center">
        <h1><?= $_SESSION['message_delete'] ?></h1>
        <?php
                    unset($_SESSION['message_delete']);
        ?>
        <div>
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M9 17C9 17 16 18 19 21H20C20.5523 21 21 20.5523 21 20V13.937C21.8626 13.715 22.5 12.9319 22.5 12C22.5 11.0681 21.8626 10.285 21 10.063V4C21 3.44772 20.5523 3 20 3H19C16 6 9 7 9 7H5C3.89543 7 3 7.89543 3 9V15C3 16.1046 3.89543 17 5 17H6L7 22H9V17ZM11 8.6612C11.6833 8.5146 12.5275 8.31193 13.4393 8.04373C15.1175 7.55014 17.25 6.77262 19 5.57458V18.4254C17.25 17.2274 15.1175 16.4499 13.4393 15.9563C12.5275 15.6881 11.6833 15.4854 11 15.3388V8.6612ZM5 9H9V15H5V9Z"
                    fill="rgba(255,255,255,1)"></path>
            </svg>
        </div>
    </div>
    <?php endif; ?>
    <div class="flex justify-end mt-8 gap-3">
        <a class="bg-gradient-to-tr from-emerald-200 to-emerald-50 text-emerald-700 px-4 py-2 shadow rounded-lg"
            target="_blank" href="<?= $base_url ?>admin/report/after-report.php">
            Report Pdf
        </a>
        <a class="bg-gradient-to-tr from-emerald-200 to-emerald-50 text-emerald-700 px-4 py-2 shadow rounded-lg"
            href="<?= $base_url ?>admin/after/after-add.php">
            Tambah Data
        </a>
    </div>
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <h2 class="text-emerald-500 text-lg font-semibold pb-4">List Data Sesudah Therapy</h2>
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-emerald-100 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Act
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Nama
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Alamat
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Therapy & Therapis
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Hari/Tgl
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Pembayaran
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Time Created
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($after_result as $key => $row): ?>
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
                                    <?= $key + 1 ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
                                    <a href="<?= $base_url ?>admin/after/after-edit.php?id=<?= $row['id'] ?>">
                                        <svg class="w-6 h-6 bg-emerald-100 shadow rounded-full p-1"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M15.7279 9.57629L14.3137 8.16207L5 17.4758V18.89H6.41421L15.7279 9.57629ZM17.1421 8.16207L18.5563 6.74786L17.1421 5.33365L15.7279 6.74786L17.1421 8.16207ZM7.24264 20.89H3V16.6474L16.435 3.21233C16.8256 2.8218 17.4587 2.8218 17.8492 3.21233L20.6777 6.04075C21.0682 6.43128 21.0682 7.06444 20.6777 7.45497L7.24264 20.89Z"
                                                fill="rgba(0,107,107,1)"></path>
                                        </svg>
                                    </a>
                                    <a href="<?= $base_url ?>admin/after/after-delete.php?id=<?= $row['id'] ?>">
                                        <svg class="w-6 h-6 bg-emerald-100 shadow rounded-full p-1 mt-2"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M20 7V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V7H2V5H22V7H20ZM6 7V20H18V7H6ZM7 2H17V4H7V2ZM11 10H13V17H11V10Z"
                                                fill="rgba(255,98,98,1)"></path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                    <ul>
                                        <li><?= $row['name'] ?></li>
                                        <li>WA : <?= $row['whatsapp'] ?></li>
                                    </ul>
                                </td>
                                <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                    <ul>
                                        <li><strong>Desa</strong> : <?= $row['village'] ?></li>
                                        <li><strong>Kec.</strong> : <?= $row['subdistrict'] ?></li>
                                        <li><strong>Kota</strong> : <?= $row['city'] ?></li>
                                        <li class="whitespace-pre-line"> <strong>Alamat lengkap</strong> :
                                            <?= $row['address'] ?></li>
                                    </ul>
                                </td>
                                <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                    <?= $row['type_therapy'] . ' / ' . $row['therapyst'] ?>
                                </td>
                                <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                    <?= $row['day'] . ' / ' . date("Y-m-d", strtotime($row['date'])) ?>
                                </td>
                                <td class="text-sm text-emerald-900 font-light px-6 py-4 whitespace-nowrap">
                                    <?= 'Rp' . $row['price'] . ' / ' . $row['type_payment'] ?>
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


<?php require_once 'layouts/footer.php' ?>