<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .nav-link {
            position: relative;
            padding-bottom: 4px;
            color: black;
        }

        .nav-link:hover {
            color: #ff6a00;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0%;
            height: 3px;
            background: #ff6a00;
            transition: width 0.25s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active {
            color: #ff6a00;
        }

        .nav-link.active::after {
            width: 100%;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">

    <nav class="navbar flex w-full items-center px-20 py-5 justify-between shadow-md ">
        <div class="navbar-start max-md:w-1/4">
            <a class="text-2xl font-bold tracking-wide no-underline" href="#" style="color:#ff6a00;">
                FlyonUI
            </a>
        </div>

        <div class="navbar-center max-md:hidden">
            <ul class="menu menu-horizontal flex justify-between px-40 font-medium">
                <li><a href="#" class="nav-link mx-3 active">Shop</a></li>
                <li><a href="#" class="nav-link mx-3">Collections</a></li>
                <li><a href="#" class="nav-link mx-3">Explore</a></li>
            </ul>
        </div>

        <div class="navbar-end items-center gap-4">
            <div class="dropdown relative inline-flex md:hidden">
                <button id="dropdown-default" type="button"
                    class="dropdown-toggle btn btn-text btn-secondary btn-square" aria-haspopup="menu"
                    aria-expanded="false" aria-label="Dropdown">
                    <span class="icon-[tabler--menu-2] dropdown-open:hidden size-5"></span>
                    <span class="icon-[tabler--x] dropdown-open:block hidden size-5"></span>
                </button>
                <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                    aria-orientation="vertical" aria-labelledby="dropdown-default">
                    <li><a class="dropdown-item" href="#">Shop</a></li>
                    <li><a class="dropdown-item" href="#">Collections</a></li>
                    <li><a class="dropdown-item" href="#">Explore</a></li>
                </ul>
            </div>

            <a class="btn max-md:btn-square  px-5 py-2 rounded-md"
                 href="#">
                <span class="max-md:hidden  px-2"><i class="fa-solid text-[#ff6a00] fa-cart-arrow-down"></i> Cart</span>
                <span class="max-md:hidden  px-2"><i class="fa-regular fa-user text-[#ff6a00]"></i> My account</span>
            </a>
        </div>
    </nav>

</body>

</html>
