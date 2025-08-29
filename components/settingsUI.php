<main class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Settings Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Settings</h1>
            <p class="text-gray-600 mt-2">Manage your account settings and preferences</p>
        </div>

        <!-- Settings Grid -->
        <div class="grid gap-8">
            <!-- Profile Settings -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Profile Settings</h2>
                <form id="profileForm" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-travel-blue focus:border-transparent"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-travel-blue focus:border-transparent"
                            >
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio:</label>
                            <textarea 
                                id="bio" 
                                name="bio" 
                                placeholder="Write something about yourself..."
                                rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-travel-blue focus:border-transparent"
                            ></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Account Settings -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Account Settings</h2>
                <form id="accountForm" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                            <input 
                                type="password" 
                                name="currentPassword" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-travel-blue focus:border-transparent"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                            <input 
                                type="password" 
                                name="newPassword" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-travel-blue focus:border-transparent"
                            >
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                            <input 
                                type="password" 
                                name="confirmPassword" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-travel-blue focus:border-transparent"
                            >
                        </div>
                    </div>
                </form>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end space-x-4">
                <button 
                    type="button" 
                    class="px-6 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-300"
                >
                    Cancel
                </button>
                <button 
                    type="button" 
                    onclick="saveSettings()" 
                    class="px-6 py-2 bg-gradient-to-r from-travel-blue to-travel-orange text-white rounded-lg hover:shadow-lg transition duration-300"
                >
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</main>
