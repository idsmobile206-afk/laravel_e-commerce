<div class="flex h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col shadow-sm fixed h-screen">

        <!-- LOGO + TITLE -->
        <div class="h-20 flex items-center gap-3 px-4 border-b border-gray-200">
            <img src="https://img.freepik.com/premium-vector/online-shop-e-commerce-logo_1199645-37307.jpg?semt=ais_hybrid&w=740&q=80"
                class="h-12 w-12 object-cover" alt="logo">
            <span class="text-gray-700 font-semibold text-lg">
                Stock Management
            </span>
        </div>

        <!-- SEARCH BAR -->
        <div class="px-4 py-3 border-b border-gray-200">
            <input type="text" placeholder="Search..."
                class="w-full px-3 py-2 text-sm rounded-md border border-gray-300 focus:border-gray-500 focus:ring-0">
        </div>

        <!-- NAV -->
        <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
            <a href="/products" class="block rounded-md px-3 py-2 text-sm font-medium text-gray-700 bg-gray-100">
                Products
            </a>

            <a href="/colors"
                class="block rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                Colors
            </a>

            <a href="/clients"
                class="block rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                Clients
            </a>

            <a href="#"
                class="block rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                Commands
            </a>

            <a href="#"
                class="block rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                Categories
            </a>

            <a href="#"
                class="block rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                Deliveries
            </a>

            <a href="#"
                class="block rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900">
                Shipping
            </a>
        </nav>

        <!-- USER + LOGOUT -->

        @auth
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center space-x-3 mb-3">
                    <img src="https://img.freepik.com/free-photo/fair-haired-woman-looking-with-pleased-calm-expression_176420-15145.jpg?semt=ais_hybrid&w=740&q=80"
                        class="h-10 w-10 rounded-full" alt="{{ auth()->user()->name }}">
                    <div>
                        <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->role ?? 'User' }}</p>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full text-left block rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-red-100 hover:text-red-600 transition">
                        Déconnexion
                    </button>
                </form>
            </div>
        @endauth


    </aside>


</div>
