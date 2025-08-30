<header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-r from-travel-blue to-travel-orange rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 
                               002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 
                               2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 
                               104 0 2 2 0 012-2h1.064M15 
                               20.488V18a2 2 0 012-2h3.064M21 
                               12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <span
                    class="text-xl font-bold bg-gradient-to-r from-travel-blue to-travel-orange bg-clip-text text-transparent">
                    Wanderlust
                </span>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="home.php" class="text-gray-700 hover:text-travel-blue font-medium transition duration-300">Home</a>
                <a href="destinations.php" class="text-gray-700 hover:text-travel-blue font-medium transition duration-300">Destinations</a>
                <a href="vlogs.php" class="text-gray-700 hover:text-travel-blue font-medium transition duration-300">Vlogs</a>
                <a href="#" class="text-gray-700 hover:text-travel-blue font-medium transition duration-300">About</a>
                <!-- <a href="#" class="text-gray-700 hover:text-travel-blue font-medium transition duration-300">Contact</a> -->
            </nav>

            <!-- Search and Profile -->
            <div class="flex items-center space-x-4">
                <div class="relative hidden sm:block">
                    <input type="text" placeholder="Search destinations..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-travel-blue focus:border-transparent">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 
                               11-14 0 7 7 0 0114 0z">
                        </path>
                    </svg>
                </div>
                <div class="relative">
                    <button
                        onclick="toggleProfileDropdown()"
                        class="bg-gradient-to-r from-travel-blue to-travel-orange text-white px-4 py-2 rounded-full hover:shadow-lg transition duration-300 flex items-center space-x-2">
                        <span><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest'; ?></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                        <a href="profile.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-travel-blue">Profile</a>
                        <a href="settings.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-travel-blue">Settings</a>
                        <a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-travel-blue">Logout</a>
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <button class="md:hidden text-gray-700" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-t">
        <div class="px-4 py-2 space-y-2">
            <a href="#" class="block py-2 text-gray-700 hover:text-travel-blue">Home</a>
            <a href="destinations.php" class="block py-2 text-gray-700 hover:text-travel-blue">Destinations</a>
            <a href="#" class="block py-2 text-gray-700 hover:text-travel-blue">Vlogs</a>
            <a href="#" class="block py-2 text-gray-700 hover:text-travel-blue">About</a>
            <!-- <a href="#" class="block py-2 text-gray-700 hover:text-travel-blue">Contact</a> -->
            <div class="pt-2">
                <input type="text" placeholder="Search..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>
    </div>

    <script>
        // Profile dropdown toggle
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profileDropdown');
            const profileButton = event.target.closest('button');
            
            if (!profileButton && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</header>