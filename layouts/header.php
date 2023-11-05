<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost:8080/dist/css/output.css">
    <title>Hakam Therapy</title>
</head>

<body style="font-family: 'Poppins', sans-serif;">
    <header class="bg-white shadow">
        <div class="container mx-auto md:px-20 px-4">
            <nav class="flex w-full justify-between py-4 items-center">
                <a href="/" class="font-bold md:text-2xl text-xl">
                    <span>Hakam</span><span class="text-emerald-600">Therapy</span>
                </a>
                <div>
                    <div class="md:flex hidden gap-3">
                        <a href="register-therapy.php"
                            class="border rounded-full border-emerald-400 text-white px-4 py-2 bg-gradient-to-tr from-emerald-500 to-emerald-400 hover:bg-gradient-to-tl ">
                            Daftar Therapy
                        </a>
                        <a href="after_therapy.php"
                            class="bg-white hover:bg-gradient-to-tr hover:from-emerald-500 hover:to-emerald-400 hover:text-white border rounded-full border-emerald-400 text-emerald-500 px-4 py-2">
                            Sudah Therapy
                        </a>
                    </div>

                    <div id="btn-burger-close" class="md:hidden block">
                        <svg id="burger" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                        </svg>
                        <svg id="close" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z">
                            </path>
                        </svg>
                    </div>

                    <div id="dropdown-menu" class="__dropdown-menu hidden">
                        <a href="register-therapy.php"
                            class="px-3 py-3 text-sm border-b font-medium flex items-center space-x-2 hover:bg-emerald-400 hover:text-emerald-900">
                            Daftar Therapy
                        </a>
                        <a href="after_therapy.php"
                            class="px-3 py-3 text-sm font-medium flex items-center space-x-2 hover:bg-emerald-400 hover:text-emerald-900">
                            Sudah Therapy
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>