<?php include '../layouts/header.php' ?>

<?php

session_start();

if (isset($_SESSION['username'])) {
    header('Location: admin.php');

    exit;
}

require_once '../connection.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: admin.php");

        exit;
    } else {
        echo "Login gagal. Periksa kembali username dan password.";
    }
}

?>


<div class="flex fixed inset-0 h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat"
    style="background-image:url('https://source.unsplash.com/random/photo-1499123785106-343e69e68db1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1748&q=80')">
    <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
        <div class="text-white">
            <div class="mb-8 flex flex-col items-center">
                <div class="text-4xl font-bold">Hakam <span class="text-emerald-600">Therapy</span></div>
                <span class="text-gray-300">Login sebagai administrator di Hakam Therapy</span>
            </div>
            <form action="" method="post">
                <div class="mb-4 text-lg">
                    <input
                        class="rounded-3xl w-full border-none bg-emerald-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"
                        type="text" name="username" placeholder="type your username" />
                </div>

                <div class="mb-4 text-lg">
                    <input
                        class="rounded-3xl w-full border-none bg-emerald-400 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md"
                        type="password" name="password" placeholder="*********" />
                </div>
                <div class="mt-8 flex justify-center text-lg text-black">
                    <button type="submit" name="login"
                        class="rounded-3xl bg-emerald-400 bg-opacity-50 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-emerald-600">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php' ?>