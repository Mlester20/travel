    <main class="container mx-auto px-4 py-8">
        <!-- Profile Header -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="h-48 bg-gradient-to-r from-travel-blue to-travel-orange relative">
                <!-- Cover Photo Edit Button -->
                <button class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-lg hover:bg-white/30 transition flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Edit Cover</span>
                </button>
            </div>
            <div class="px-8 pb-8 mt-8">
                <div class="flex flex-col md:flex-row items-center md:items-end -mt-20 mb-8">
                    <!-- Profile Picture -->
                    <div class="relative">
                        <div class="w-32 h-32 bg-white rounded-full border-4 border-white shadow-lg overflow-hidden">
                            <div id="profilePicContainer" class="w-full h-full">
                                <?php
                                require_once 'includes/config.php';
                                $db = new Database();
                                $conn = $db->connect();
                                
                                $user_id = $_SESSION['user_id'] ?? null;
                                if ($user_id) {
                                    $query = "SELECT profile FROM users WHERE user_id = ?";
                                    $stmt = $conn->prepare($query);
                                    $stmt->bind_param("i", $user_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $user = $result->fetch_assoc();
                                    $profile_img = $user['profile'] ?? '';
                                    $stmt->close();
                                }
                                ?>
                                <?php if (isset($profile_img) && !empty($profile_img)) : ?>
                                    <img src="<?php echo $profile_img; ?>" class="w-full h-full object-cover" alt="Profile Picture">
                                <?php else : ?>
                                    <div class="w-full h-full bg-gradient-to-br from-travel-blue to-travel-orange flex items-center justify-center text-white text-4xl font-bold">
                                        <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Profile Picture Edit Button -->
                        <label class="absolute bottom-2 right-2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-50 transition cursor-pointer">
                            <input type="file" id="profilePicInput" class="hidden" accept="image/*">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </label>
                    </div>
                    <!-- Profile Info -->
                    <div class="md:ml-8 mt-4 md:mt-0 text-center md:text-left flex-grow">
                        <h1 class="text-3xl font-bold text-gray-800" id="profileName">Loading...</h1>
                        <p class="text-gray-600 mt-2" id="profileBio">Loading...</p>
                    </div>
                    <!-- Edit Profile Button -->
                    <button class="mt-4 md:mt-0 bg-gradient-to-r from-travel-blue to-travel-orange text-white px-6 py-2 rounded-full hover:shadow-lg transition duration-300 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                        <span>Edit Profile</span>
                    </button>
                </div>

                <!-- Profile Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center p-4 bg-gray-50 rounded-xl">
                        <div class="text-2xl font-bold text-gray-800">24</div>
                        <div class="text-gray-600">Posts</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-xl">
                        <div class="text-2xl font-bold text-gray-800">1.2K</div>
                        <div class="text-gray-600">Followers</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-xl">
                        <div class="text-2xl font-bold text-gray-800">348</div>
                        <div class="text-gray-600">Following</div>
                    </div>
                    <div class="text-center p-4 bg-gray-50 rounded-xl">
                        <div class="text-2xl font-bold text-gray-800">15</div>
                        <div class="text-gray-600">Countries</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Content Tabs -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="border-b">
                <div class="flex">
                    <button class="px-6 py-4 text-travel-blue border-b-2 border-travel-blue font-medium">Posts</button>
                    <button class="px-6 py-4 text-gray-600 hover:text-gray-800 font-medium">Photos</button>
                    <button class="px-6 py-4 text-gray-600 hover:text-gray-800 font-medium">Videos</button>
                    <button class="px-6 py-4 text-gray-600 hover:text-gray-800 font-medium">Saved</button>
                </div>
            </div>
            
            <!-- Posts Grid -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Sample Post Cards - Replace with actual data -->
                    <div class="bg-gray-50 rounded-xl overflow-hidden shadow hover:shadow-md transition">
                        <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500"></div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800">Beautiful Sunset in Bali</h3>
                            <p class="text-gray-600 text-sm mt-1">Amazing evening at Uluwatu Temple watching the sunset...</p>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center space-x-4 text-gray-600 text-sm">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                        </svg>
                                        128
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                                        </svg>
                                        24
                                    </span>
                                </div>
                                <span class="text-gray-500 text-sm">2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <!-- Add more post cards here -->
                </div>
            </div>
        </div>
    </main>

    <script>
        // Handle profile picture change
        document.getElementById('profilePicInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Show preview immediately
                const reader = new FileReader();
                reader.onload = function(e) {
                    const container = document.getElementById('profilePicContainer');
                    container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                }
                reader.readAsDataURL(file);

                // Upload to server
                const formData = new FormData();
                formData.append('action', 'update_profile_picture');
                formData.append('profile_picture', file);

                fetch('controllers/updateProfile.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Update session and profile picture display
                        const container = document.getElementById('profilePicContainer');
                        container.innerHTML = `<img src="${data.path}" class="w-full h-full object-cover">`;
                    } else {
                        // Handle error and revert to initial state
                        alert('Error updating profile picture: ' + data.message);
                        const container = document.getElementById('profilePicContainer');
                        container.innerHTML = `<div class="w-full h-full bg-gradient-to-br from-travel-blue to-travel-orange flex items-center justify-center text-white text-4xl font-bold">
                            <?php echo substr($_SESSION['name'] ?? 'U', 0, 1); ?>
                        </div>`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error uploading profile picture');
                });
            }
        });
    </script>