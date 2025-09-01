<?php
if (!isset($profileData)) {
    die("Profile data not available");
}
?>
    <main class="container mx-auto px-4 py-8">
        <!-- Profile Header -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
            <div class="h-48 bg-gradient-to-r from-travel-blue to-travel-orange relative">
                <!-- Cover Photo Edit Button -->
                <?php if ($profileData['is_own_profile']): ?>
                <button class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-lg hover:bg-white/30 transition flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Edit Cover</span>
                </button>
                <?php endif; ?>
            </div>
            <div class="px-8 pb-8 mt-8">
                <div class="flex flex-col md:flex-row items-center md:items-end -mt-20 mb-8">
                    <!-- Profile Picture -->
                    <div class="relative">
                        <div class="w-32 h-32 bg-white rounded-full border-4 border-white shadow-lg overflow-hidden">
                            <div id="profilePicContainer" class="w-full h-full">
                                <?php if (!empty($profileData['profile'])) : ?>
                                    <img src="<?php echo htmlspecialchars($profileData['profile']); ?>" class="w-full h-full object-cover" alt="Profile Picture">
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
                        <?php if ($profileData['is_own_profile']): ?>
                        <label class="absolute bottom-2 right-2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-50 transition cursor-pointer">
                            <input type="file" id="profilePicInput" class="hidden" accept="image/*">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </label>
                        <?php endif; ?>
                    </div>
                    <!-- Profile Info -->
                    <div class="md:ml-8 mt-4 md:mt-0 text-center md:text-left flex-grow">
                        <h1 class="text-3xl font-bold text-gray-800" id="profileName">Loading...</h1>
                        <p class="text-gray-600 mt-2" id="profileBio">Loading...</p>
                    </div>
                    <!-- Edit Profile Button -->
                    <?php if ($profileData['is_own_profile']): ?>
                    <button class="mt-4 md:mt-0 bg-gradient-to-r from-travel-blue to-travel-orange text-white px-6 py-2 rounded-full hover:shadow-lg transition duration-300 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                        <span>Edit Profile</span>
                    </button>
                    <?php endif; ?>
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
                
            <div class="container mx-auto px-4 py-8">
                <div class="mb-6 flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-gray-800">My Posts</h1>
                    <div class="flex space-x-3">
                        <button onclick="postFetcher.refresh()" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                            </svg>
                            Refresh
                        </button>
                        <button onclick="createNewPost()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            New Post
                        </button>
                    </div>
                </div>

                <!-- Posts Container - This will be populated dynamically -->
                <div id="posts-container" class="p-6">
                    <!-- Posts will be loaded here by JavaScript -->
                    <div class="flex items-center justify-center py-12">
                        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                        <span class="ml-3 text-gray-600">Loading posts...</span>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <?php if ($profileData['is_own_profile']): ?>
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
                            <svg class="w-16 h-16 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
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
    <?php endif; ?>