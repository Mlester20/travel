<main class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="relative rounded-3xl overflow-hidden mb-12">
        <div class="absolute inset-0 bg-gradient-to-r from-travel-blue to-travel-orange opacity-90"></div>
        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e" alt="Beautiful Beach" class="w-full h-96 object-cover">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Discover Paradise</h1>
                <p class="text-xl md:text-2xl">Explore the most beautiful destinations in the Philippines</p>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="flex flex-wrap gap-4 mb-8">
        <button class="px-6 py-2 bg-white rounded-full shadow-md hover:shadow-lg transition text-travel-blue font-medium">All</button>
        <button class="px-6 py-2 bg-white rounded-full shadow-md hover:shadow-lg transition text-gray-600 hover:text-travel-blue">Beaches</button>
        <button class="px-6 py-2 bg-white rounded-full shadow-md hover:shadow-lg transition text-gray-600 hover:text-travel-blue">Mountains</button>
        <button class="px-6 py-2 bg-white rounded-full shadow-md hover:shadow-lg transition text-gray-600 hover:text-travel-blue">Cities</button>
        <button class="px-6 py-2 bg-white rounded-full shadow-md hover:shadow-lg transition text-gray-600 hover:text-travel-blue">Historical</button>
    </div>

    <!-- Destinations Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Boracay -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e" alt="Boracay" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-sm rounded-full px-4 py-1 text-sm font-medium text-travel-blue">
                    Beach
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Boracay Island</h3>
                <p class="text-gray-600 mb-4">Experience world-famous white sand beaches and crystal-clear waters in this tropical paradise.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Aklan, Philippines</span>
                    </div>
                    <span class="text-travel-blue font-semibold">4.9 ★</span>
                </div>
            </div>
        </div>

        <!-- Palawan -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
            <div class="relative">
                <img src="../public/images/palawan.jpg" alt="El Nido" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-sm rounded-full px-4 py-1 text-sm font-medium text-travel-blue">
                    Beach
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">El Nido, Palawan</h3>
                <p class="text-gray-600 mb-4">Discover limestone cliffs, lagoons, and pristine beaches in this natural wonder.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Palawan, Philippines</span>
                    </div>
                    <span class="text-travel-blue font-semibold">4.8 ★</span>
                </div>
            </div>
        </div>

        <!-- Chocolate Hills -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
            <div class="relative">
                <img src="../public/images/chocolate.jpg" alt="Chocolate Hills" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-sm rounded-full px-4 py-1 text-sm font-medium text-travel-blue">
                    Natural Wonder
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Chocolate Hills</h3>
                <p class="text-gray-600 mb-4">Marvel at over 1,000 symmetrical hills that turn brown during dry season.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Bohol, Philippines</span>
                    </div>
                    <span class="text-travel-blue font-semibold">4.7 ★</span>
                </div>
            </div>
        </div>

        <!-- Vigan -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1578469550956-0e16b69c6a3d" alt="Vigan" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-sm rounded-full px-4 py-1 text-sm font-medium text-travel-blue">
                    Historical
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Vigan City</h3>
                <p class="text-gray-600 mb-4">Step back in time in this UNESCO World Heritage site with Spanish colonial architecture.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Ilocos Sur, Philippines</span>
                    </div>
                    <span class="text-travel-blue font-semibold">4.6 ★</span>
                </div>
            </div>
        </div>

        <!-- Mount Mayon -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
            <div class="relative">
                <img src="../public/images/mayon.jpg" alt="Mount Mayon" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-sm rounded-full px-4 py-1 text-sm font-medium text-travel-blue">
                    Mountain
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Mount Mayon</h3>
                <p class="text-gray-600 mb-4">Witness the perfect cone shape of this active volcano, known for its symmetrical beauty.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Albay, Philippines</span>
                    </div>
                    <span class="text-travel-blue font-semibold">4.8 ★</span>
                </div>
            </div>
        </div>

        <!-- Siargao -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden group">
            <div class="relative">
                <img src="../public/images/siargao.jpg" alt="Siargao" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                <div class="absolute top-4 right-4 bg-white/80 backdrop-blur-sm rounded-full px-4 py-1 text-sm font-medium text-travel-blue">
                    Beach
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Siargao Island</h3>
                <p class="text-gray-600 mb-4">Surf the famous Cloud 9 waves and explore the laid-back island vibes of this paradise.</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-2 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Surigao del Norte, Philippines</span>
                    </div>
                    <span class="text-travel-blue font-semibold">4.7 ★</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Load More Button -->
    <div class="flex justify-center mt-12">
        <button class="px-8 py-3 bg-gradient-to-r from-travel-blue to-travel-orange text-white rounded-full hover:shadow-lg transition duration-300">
            Load More Destinations
        </button>
    </div>
</main>