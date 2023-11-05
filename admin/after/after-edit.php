<?php require_once '../layouts/header.php' ?>


<?php

require_once '../../connection.php';

session_start();

if (empty($_SESSION['username'])) {
    header('Location: login.php');

    exit;
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $after_query = "SELECT * FROM after_therapy WHERE id=$id";
    $after_stmt = $conn->prepare($after_query);
    $after_stmt->execute();
    $after_result = $after_stmt->fetch();

}


if (isset($_POST['update'])) {

    $name          = $_POST['name'];
    $address       = $_POST['address'];
    $village       = $_POST['village'];
    $subdistrict   = $_POST['subdistrict'];
    $city          = $_POST['city'];
    $whatsapp      = $_POST['whatsapp'];
    $day           = $_POST['day'];
    $date          = $_POST['date'];
    $type_therapy  = $_POST['type_therapy'];
    $therapyst     = $_POST['therapyst'];
    $price         = $_POST['price'];
    $type_payment = $_POST['type_payment'];

    $sql = "UPDATE after_therapy
            SET 
                name=:name, 
                address=:address, 
                village=:village, 
                subdistrict=:subdistrict, 
                city=:city, 
                whatsapp=:whatsapp, 
                day=:day, 
                date=:date, 
                type_therapy=:type_therapy, 
                therapyst=:therapyst, 
                price=:price, 
                type_payment=:type_payment
            WHERE id=$id";

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':name'          => $name,
        ':address'       => $address,
        ':village'       => $village,
        ':subdistrict'   => $subdistrict,
        ':city'          => $city,
        ':whatsapp'      => $whatsapp,
        ':day'           => $day,
        ':date'          => $date,
        ':type_therapy'  => $type_therapy,
        ':therapyst'     => $therapyst,
        ':price'         => $price,
        ':type_payment' => $type_payment
    ]);

    $after_query = "SELECT * FROM after_therapy WHERE id=$id";
    $after_stmt = $conn->prepare($after_query);
    $after_stmt->execute();
    $after_result = $after_stmt->fetch();

    $_SESSION['message_register_therapy'] = "Berhasil Update Sesusah Therapy di HakamTherapy";
}


?>


<div class="flex-1 p-4 w-full md:w-1/2">
    <?php if(isset($_SESSION['message_register_therapy'])): ?>
    <div class="bg-emerald-500 w-full px-8 py-4 rounded text-white mb-8 flex justify-between items-center">
        <h1><?= $_SESSION['message_register_therapy'] ?></h1>
        <?php
                    unset($_SESSION['message_register_therapy']);
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
    <div class="mt-4 bg-white p-4 shadow rounded-lg">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="mx-auto w-full ">
                        <h2 class="text-2xl font-bold">Isi Formulir Setelah Therapy</h2>
                        <form class="mt-8" action="" method="POST">
                            <div class="mb-5">
                                <label for="name" class="mb-3 block text-base font-light">
                                    Nama Lengkap
                                </label>
                                <input value="<?= $after_result['name'] ?>" required type="text" name="name" id="name"
                                    placeholder="Full Name" class="__input-text" />
                            </div>
                            <div class="mb-5">
                                <label for="address" class="mb-3 block text-base font-light">
                                    Alamat
                                </label>
                                <textarea required rows="4" name="address" id="address"
                                    placeholder="Isikan alamat lengkap anda"
                                    class="__textarea"><?= $after_result['address'] ?></textarea>
                            </div>
                            <div class="mb-5">
                                <label for="village" class="mb-3 block text-base font-light">
                                    Desa
                                </label>
                                <input value="<?= $after_result['village'] ?>" required type="text" name="village"
                                    id="village" placeholder="Isikan nama desa anda" class="__input-text" />
                            </div>

                            <div class="mb-5">
                                <label for="subdistrict" class="mb-3 block text-base font-light">
                                    Kecamatan
                                </label>
                                <input value="<?= $after_result['subdistrict'] ?>" required type="text"
                                    name="subdistrict" id="subdistrict" placeholder="Isikan nama kecamatan anda"
                                    class="__input-text" />
                            </div>
                            <div class="mb-5">
                                <label for="city" class="mb-3 block text-base font-light">
                                    Kota/Kabupaten
                                </label>
                                <input value="<?= $after_result['city'] ?>" required type="text" name="city" id="city"
                                    placeholder="Isikan nama kota/kabupaten anda" class="__input-text" />
                            </div>
                            <div class="mb-5">
                                <label for="whatsapp" class="mb-3 block text-base font-light">
                                    No.Whatsapp
                                </label>
                                <input value="<?= $after_result['whatsapp'] ?>" required type="text" name="whatsapp"
                                    id="whatsapp" placeholder="Isikan nama kota/kabupaten anda" class="__input-text" />
                            </div>
                            <div class="mb-5">
                                <label for="price" class="mb-3 block text-base font-light">
                                    Hari/Tanggal
                                </label>
                                <div class="flex">
                                    <select class="__input-text w-1/2 rounded-r-none" name="day" id="day">
                                        <option <?php print($after_result['day'] == 'Senin') ? 'selected' : '' ?>
                                            value="Senin">Senin</option>
                                        <option <?php print($after_result['day'] == 'Selasa') ? 'selected' : '' ?>
                                            value="Selasa">Selasa</option>
                                        <option <?php print($after_result['day'] == 'Rabu') ? 'selected' : '' ?>
                                            value="Rabu">Rabu</option>
                                        <option <?php print($after_result['day'] == 'Kamis') ? 'selected' : '' ?>
                                            value="Kamis">Kamis</option>
                                        <option <?php print($after_result['day'] == 'Jumat') ? 'selected' : '' ?>
                                            value="Jumat">Jumat</option>
                                        <option <?php print($after_result['day'] == 'Sabtu') ? 'selected' : '' ?>
                                            value="Sabtu">Sabtu</option>
                                        <option <?php print($after_result['day'] == 'Minggu') ? 'selected' : '' ?>
                                            value="Minggu">Minggu</option>
                                    </select>
                                    <input required type="date" name="date" id="date"
                                        placeholder="Isikan nama kota/kabupaten anda"
                                        class="__input-text w-1/2 border-l-0 rounded-l-none"
                                        value="<?= date('Y-m-d', strtotime($after_result['date'])) ?>" />
                                </div>
                            </div>
                            <div class="mb-5">
                                <label for="type_therapy" class="mb-3 block text-base font-light">
                                    Therapy
                                </label>
                                <select class="__input-text" name="type_therapy" id="type_therapy">
                                    <option <?php print($after_result['type_therapy'] == 'pijat') ? 'selected' : '' ?>
                                        value="pijat">Pijat</option>
                                    <option <?php print($after_result['type_therapy'] == 'bekam') ? 'selected' : '' ?>
                                        value="bekam">Bekam</option>
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="therapyst" class="mb-3 block text-base font-light">
                                    Therapis
                                </label>
                                <input value="<?= $after_result['therapyst'] ?>" required type="text" name="therapyst"
                                    id="therapyst" placeholder="Isikan nama Therapis" class="__input-text" />
                            </div>
                            <div class="mb-5">
                                <label for="price" class="mb-3 block text-base font-light">
                                    Pembayaran
                                </label>
                                <div class="flex">
                                    <input value="<?= $after_result['price'] ?>" required type="number" name="price"
                                        id="price" placeholder="Rp." class="__input-text rounded-r-none w-2/3" />
                                    <select class="__input-text border-l-0 rounded-l-none w-1/3" name="type_payment"
                                        id="type_payment">
                                        <option
                                            <?php print($after_result['type_payment'] == 'CASH') ? 'selected' : '' ?>
                                            value="CASH">Cash</option>
                                        <option
                                            <?php print($after_result['type_payment'] == 'TRANSFER') ? 'selected' : '' ?>
                                            value="TRANSFER">Transfer</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <button name="update" type="submit"
                                    class="border md:w-auto w-full rounded-md px-10 border-emerald-400 text-white py-2 bg-gradient-to-tr from-emerald-500 to-emerald-400 hover:bg-gradient-to-tl ">
                                    Selesai Therapy
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once '../layouts/footer.php' ?>