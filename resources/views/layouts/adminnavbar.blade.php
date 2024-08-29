<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body>
    <nav class="bg-[#373A40]">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img src="g.png" alt="Logo" class="w-10 h-8">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4 justify-center mt-1">
                            <a href="{{ route('admin.dashboard') }}"
                                class="px-3 py-2 text-[#EEEEEE] hover:text-[#DC5F00] hover:border-b-2 border-[#DC5F00]">
                                แผงควบคุม
                            </a>
                            <a href="{{ route('customer.repir') }}"
                                class="px-3 py-2 text-[#EEEEEE] hover:text-[#DC5F00] hover:border-b-2 border-[#DC5F00]">
                                รายการแจ้งซ่อม
                            </a>
                            <a href="{{ route('employee.add') }}"
                                class="px-3 py-2 text-[#EEEEEE] hover:text-[#DC5F00] hover:border-b-2 border-[#DC5F00]">
                                เพิ่มพนักงาน
                            </a>
                            <a href="{{ route('product.add') }}"
                                class="px-3 py-2 text-[#EEEEEE] hover:text-[#DC5F00] hover:border-b-2 border-[#DC5F00]">
                                เพิ่มสินค้า
                            </a>
                            <a href="{{ route('products.view') }}"
                                class="px-3 py-2 text-[#EEEEEE] hover:text-[#DC5F00] hover:border-b-2 border-[#DC5F00]">
                                รายการสินค้า
                            </a>
                            <a href="{{ route('employee.list') }}"
                                class="px-3 py-2 text-[#EEEEEE] hover:text-[#DC5F00] hover:border-b-2 border-[#DC5F00]">
                                รายชื่อพนักงาน
                            </a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <a href="{{ route('logout') }}"
                        class="text-[#EEEEEE] hover:text-[#DC5F00] hover:border-b-2 border-[#DC5F00]" role="menuitem">
                        <button type="button">ออกจากระบบ</button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-[#EEEEEE] hover:bg-gray-700 hover:text-white">
                    แผงควบคุม
                </a>
                <a href="{{ route('customer.repir') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-[#EEEEEE] hover:bg-gray-700 hover:text-white">
                    รายการแจ้งซ่อม
                </a>
                <a href="{{ route('employee.add') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-[#EEEEEE] hover:bg-gray-700 hover:text-white">
                    เพิ่มพนักงาน
                </a>
                <a href="{{ route('product.add') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-[#EEEEEE] hover:bg-gray-700 hover:text-white">
                    เพิ่มสินค้า
                </a>
                <a href="{{ route('products.view') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-[#EEEEEE] hover:bg-gray-700 hover:text-white">
                    รายการสินค้า
                </a>
                <a href="{{ route('employee.list') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-[#EEEEEE] hover:bg-gray-700 hover:text-white">
                    รายชื่อพนักงาน
                </a>
            </div>
        </div>
    </nav>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            const isMenuOpen = mobileMenu.classList.contains('hidden');
            mobileMenu.classList.toggle('hidden', !isMenuOpen);
            mobileMenuButton.setAttribute('aria-expanded', !isMenuOpen);
        });
    </script>
</body>

</html>
