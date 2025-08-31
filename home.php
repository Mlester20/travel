<?php
session_start();
require 'includes/config.php';

$db = new Database();
$con = $db->getConnection();

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | <?php include 'includes/title.php'; ?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'travel-blue': '#0EA5E9',
                        'travel-orange': '#F97316',
                        'travel-green': '#10B981'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">

    <?php include 'components/header.php' ?>

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
                <button class="bg-white text-travel-blue px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                    Watch Latest Vlog
                </button>
                <button class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-travel-blue transition duration-300">
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
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                            NEW
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Bali Island Paradise</h3>
                        <p class="text-gray-600 mb-4">Discovering hidden waterfalls and ancient temples in the heart of Indonesia.</p>
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
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-green-400 to-teal-500"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Swiss Alps Adventure</h3>
                        <p class="text-gray-600 mb-4">Hiking through breathtaking mountain trails and experiencing local culture.</p>
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
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="relative">
                        <div class="h-48 bg-gradient-to-br from-orange-400 to-red-500"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
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
                <button class="bg-gradient-to-r from-travel-blue to-travel-orange text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transition duration-300">
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
                <div class="relative group cursor-pointer">
                    <div class="h-40 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl overflow-hidden">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-300"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h4 class="font-bold">Santorini</h4>
                            <p class="text-sm opacity-75">Greece</p>
                        </div>
                    </div>
                </div>
                <div class="relative group cursor-pointer">
                    <div class="h-40 bg-gradient-to-br from-green-400 to-green-600 rounded-xl overflow-hidden">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-300"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h4 class="font-bold">Bali</h4>
                            <p class="text-sm opacity-75">Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="relative group cursor-pointer">
                    <div class="h-40 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl overflow-hidden">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition duration-300"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h4 class="font-bold">Kyoto</h4>
                            <p class="text-sm opacity-75">Japan</p>
                        </div>
                    </div>
                </div>
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

    <!-- Newsletter Section -->
    <section class="py-20 px-4 bg-gradient-to-r from-travel-blue to-travel-orange">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                Get notified about my latest travel vlogs and destination guides. Join thousands of fellow travelers!
            </p>
            <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-4">
                <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-3 rounded-full border-0 focus:outline-none focus:ring-4 focus:ring-white/30">
                <button class="bg-white text-travel-blue px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition duration-300">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll effect for header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.classList.add('backdrop-blur-md', 'bg-white/95');
            } else {
                header.classList.remove('backdrop-blur-md', 'bg-white/95');
            }
        });
    </script>

    <style>
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slide-up {
            from { 
                transform: translateY(20px);
                opacity: 0;
            }
            to { 
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fade-in 1s ease-out;
        }

        .animate-slide-up {
            animation: slide-up 0.8s ease-out;
        }

        /* Add smooth hover transitions */
        .destination-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .destination-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #0EA5E9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0284C7;
        }
    </style>

    <!-- Testimonials Section -->
    <section class="py-20 px-4">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">What Travelers Say</h2>
                <p class="text-gray-600 text-lg">Hear from fellow adventurers who've joined our community</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-travel-blue to-travel-green rounded-full"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">Sarah Thompson</h4>
                            <p class="text-gray-500 text-sm">Adventure Enthusiast</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"The travel guides and vlogs have been invaluable in planning my trips. The attention to detail and local insights make each destination come alive!"</p>
                    <div class="mt-4 text-yellow-400">★★★★★</div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-travel-orange to-travel-red rounded-full"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">Mike Chen</h4>
                            <p class="text-gray-500 text-sm">Food & Culture Explorer</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"The food recommendations and cultural insights are spot on! I've discovered so many hidden gems that I would have missed otherwise."</p>
                    <div class="mt-4 text-yellow-400">★★★★★</div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full"></div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">Emma Rodriguez</h4>
                            <p class="text-gray-500 text-sm">Solo Traveler</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"As a solo traveler, the safety tips and community insights have been incredibly helpful. The travel guides are comprehensive and trustworthy!"</p>
                    <div class="mt-4 text-yellow-400">★★★★★</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Feed Section -->
    <section class="py-20 px-4 bg-gray-50">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Instagram Feed</h2>
                <p class="text-gray-600 text-lg">Follow our adventures on Instagram</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Instagram Post 1 -->
                <div class="relative group overflow-hidden rounded-xl aspect-square">
                    <div class="bg-gradient-to-br from-purple-400 to-pink-500 w-full h-full"></div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                        <div class="text-white opacity-0 group-hover:opacity-100 transition-all duration-300 text-center">
                            <div class="flex space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    2.5k
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18z"/>
                                    </svg>
                                    184
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Repeat for more Instagram posts -->
                <div class="relative group overflow-hidden rounded-xl aspect-square">
                    <div class="bg-gradient-to-br from-travel-blue to-travel-green w-full h-full"></div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                        <div class="text-white opacity-0 group-hover:opacity-100 transition-all duration-300 text-center">
                            <div class="flex space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    1.8k
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18z"/>
                                    </svg>
                                    156
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-xl aspect-square">
                    <div class="bg-gradient-to-br from-travel-orange to-travel-red w-full h-full"></div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                        <div class="text-white opacity-0 group-hover:opacity-100 transition-all duration-300 text-center">
                            <div class="flex space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    3.2k
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18z"/>
                                    </svg>
                                    245
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-xl aspect-square">
                    <div class="bg-gradient-to-br from-yellow-400 to-orange-500 w-full h-full"></div>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                        <div class="text-white opacity-0 group-hover:opacity-100 transition-all duration-300 text-center">
                            <div class="flex space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                    2.1k
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18z"/>
                                    </svg>
                                    167
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'components/footer.php'; ?>

    <script src="js/playVideo.js"></script>
</body>
</html>