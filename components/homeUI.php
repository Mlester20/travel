<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-black/30 z-10"></div>
    <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline>
        <source src="public/videos/hero-background.mp4" type="video/mp4">
    </video>

    <div class="relative z-20 text-center text-white px-4">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
            Explore the World
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto opacity-90">
            Join me on incredible adventures around the globe. Discover hidden gems, amazing cultures, and breathtaking landscapes.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button
                class="bg-white text-travel-blue px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                Watch Latest Vlog
            </button>
            <button
                class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-travel-blue transition duration-300">
                View All Destinations
            </button>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
        <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white rounded-full mt-2 animate-bounce"></div>
        </div>
    </div>
</section>

<!-- Featured Vlogs Section -->
<section class="py-20 px-4">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Latest Adventures</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Follow my journey as I explore stunning destinations and share unforgettable experiences from around the world.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Featured Vlog 1 -->
            <div
                class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                <div class="relative">
                    <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div
                            class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                    </div>
                    <div
                        class="absolute top-4 right-4 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                        NEW
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Bali Island Paradise</h3>
                    <p class="text-gray-600 mb-4">Discovering hidden waterfalls and ancient temples in the heart of
                        Indonesia.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-travel-blue font-medium">15 min read</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-500">2.5k views</span>
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Vlog 2 -->
            <div
                class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                <div class="relative">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-teal-500"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div
                            class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Swiss Alps Adventure</h3>
                    <p class="text-gray-600 mb-4">Hiking through breathtaking mountain trails and experiencing local
                        culture.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-travel-blue font-medium">22 min read</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-500">4.1k views</span>
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Vlog 3 -->
            <div
                class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                <div class="relative">
                    <div class="h-48 bg-gradient-to-br from-orange-400 to-red-500"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div
                            class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Tokyo Street Food</h3>
                    <p class="text-gray-600 mb-4">A culinary journey through Japan's bustling street food scene.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-travel-blue font-medium">18 min read</span>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-500">3.7k views</span>
                            <div class="flex text-yellow-400">
                                ★★★★☆
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <button
                class="bg-gradient-to-r from-travel-blue to-travel-orange text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transition duration-300">
                View All Vlogs
            </button>
        </div>
    </div>
</section>

<!-- Destinations Grid -->
<section class="py-20 px-4 bg-white">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Popular Destinations</h2>
            <p class="text-gray-600 text-lg">Explore the most visited places from my travel adventures</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Destination 1 -->
            <div class="relative group cursor-pointer">
                <div class="h-40 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl overflow-hidden">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-300"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="font-bold">Santorini</h4>
                        <p class="text-sm opacity-75">Greece</p>
                    </div>
                </div>
            </div>

            <!-- Destination 2 -->
            <div class="relative group cursor-pointer">
                <div class="h-40 bg-gradient-to-br from-green-400 to-green-600 rounded-xl overflow-hidden">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-300"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="font-bold">Bali</h4>
                        <p class="text-sm opacity-75">Indonesia</p>
                    </div>
                </div>
            </div>

            <!-- Destination 3 -->
            <div class="relative group cursor-pointer">
                <div class="h-40 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl overflow-hidden">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-300"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="font-bold">Kyoto</h4>
                        <p class="text-sm opacity-75">Japan</p>
                    </div>
                </div>
            </div>

            <!-- Destination 4 -->
            <div class="relative group cursor-pointer">
                <div class="h-40 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl overflow-hidden">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-300"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h4 class="font-bold">Morocco</h4>
                        <p class="text-sm opacity-75">Africa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>