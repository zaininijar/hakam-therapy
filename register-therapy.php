<?php
session_start();
include 'layouts/header.php';
?>

<?php

require_once 'connection.php';

if (isset($_POST['register'])) {

    $name        = $_POST['name'];
    $address     = $_POST['address'];
    $village     = $_POST['village'];
    $subdistrict = $_POST['subdistrict'];
    $city        = $_POST['city'];
    $whatsapp    = $_POST['whatsapp'];

    $sql = "INSERT INTO therapy_register(name, address, village, subdistrict, city, whatsapp) VALUES(:name, :address, :village, :subdistrict, :city, :whatsapp)";

    $statement = $conn->prepare($sql);

    $statement->execute([
        ':name' => $name,
        ':address' => $address,
        ':village' => $village,
        ':subdistrict' => $subdistrict,
        ':city' => $city,
        ':whatsapp' => $whatsapp
    ]);

    $orders_id = $conn->lastInsertId();

    $_SESSION['message_register_therapy'] = "Berhasil Mendaftar di Hakam Therapy";
}

?>


<main>
    <section class="bg-white">
        <div class="container mx-auto md:px-20 px-4 min-h-screen  flex flex-col justify-center items-center mt-8 mb-14">
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

            <div
                class="mx-auto w-full max-w-[550px] <?= print(isset($_SESSION['message_register_therapy'])) ? 'hidden' : '' ?>">
                <h2 class="text-2xl font-bold">Isi Formulir Pendaftaran</h2>
                <form class="mt-8" action="" method="POST">
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-light">
                            Nama Lengkap
                        </label>
                        <input required type="text" name="name" id="name" placeholder="Full Name"
                            class="__input-text" />
                    </div>
                    <div class="mb-5">
                        <label for="address" class="mb-3 block text-base font-light">
                            Alamat
                        </label>
                        <textarea required rows="4" name="address" id="address" placeholder="Isikan alamat lengkap anda"
                            class="__textarea"></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="village" class="mb-3 block text-base font-light">
                            Desa
                        </label>
                        <input required type="text" name="village" id="village" placeholder="Isikan nama desa anda"
                            class="__input-text" />
                    </div>

                    <div class="mb-5">
                        <label for="subdistrict" class="mb-3 block text-base font-light">
                            Kecamatan
                        </label>
                        <input required type="text" name="subdistrict" id="subdistrict"
                            placeholder="Isikan nama kecamatan anda" class="__input-text" />
                    </div>
                    <div class="mb-5">
                        <label for="city" class="mb-3 block text-base font-light">
                            Kota/Kabupaten
                        </label>
                        <input required type="text" name="city" id="city" placeholder="Isikan nama kota/kabupaten anda"
                            class="__input-text" />
                    </div>
                    <div class="mb-5">
                        <label for="whatsapp" class="mb-3 block text-base font-light">
                            No.Whatsapp
                        </label>
                        <input required type="text" name="whatsapp" id="whatsapp"
                            placeholder="Isikan nama kota/kabupaten anda" class="__input-text" />
                    </div>

                    <div>
                        <button name="register" type="submit"
                            class="border md:w-auto w-full rounded-md px-10 border-emerald-400 text-white py-2 bg-gradient-to-tr from-emerald-500 to-emerald-400 hover:bg-gradient-to-tl ">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'layouts/footer.php'; ?>