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
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0%;
            height: 3px;
            background: black;
            transition: width 0.25s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active::after {
            width: 100%;
        }
    </style>

</head>

<body>
    <nav
        class="navbar rounded-box flex w-full items-center px-20 py-5 justify-between gap-2 shadow-base-300/20 shadow-sm">
        <div class="navbar-start max-md:w-1/4">
            <a class="link text-base-content link-neutral text-xl font-bold no-underline" href="#">
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
            <a class="btn max-md:btn-square btn-primary" href="#">
                <span class="max-md:hidden px-3"><i class="fa-solid fa-cart-arrow-down"></i> cart</span>
                <span class="max-md:hidden"><i class="fa-regular fa-user"></i> My account</span>
                <span class="icon-[tabler--arrow-right] rtl:rotate-180"></span>
            </a>
        </div>
    </nav>
</body>

</html>
