<?php require_once 'layouts/header.php'; ?>

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

$after_query = "SELECT * FROM after_therapy";
$after_stmt = $conn->prepare($after_query);
$after_stmt->execute();

$after_result = $after_stmt->fetchAll();

?>


<div class="flex-1 p-4 w-full md:w-1/2">
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <h2 class="text-emerald-500 text-lg font-semibold pb-4">Data Pendaftaran Therapy</h2>
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-emerald-100 border-b">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Nama
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Alamat
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Desa
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Kecamatan
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Kota/Kabupaten
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Whatsapp
                                </th>
                                <th scope="col" class="text-sm font-medium text-emerald-900 px-6 py-4 text-left">
                                    Time Created
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $key => $row): ?>
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
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

<?php require_once 'layouts/footer.php'; ?>