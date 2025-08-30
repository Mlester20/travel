    <main class="container mx-auto px-4 py-8">
        <!-- Create Post Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Create a New Post</h2>
            <form id="createPostForm" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input 
                        type="text"
                        name="title" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-travel-blue focus:border-transparent"
                        placeholder="Enter post title"
                        required
                    >
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea 
                        name="description" 
                        rows="3" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-travel-blue focus:border-transparent"
                        placeholder="Write your post description..."
                        required
                    ></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                        <div class="space-y-2 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label class="relative cursor-pointer bg-white rounded-md font-medium text-travel-blue hover:text-travel-orange">
                                    <span>Upload image</span>
                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*" required>
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                    <div id="imagePreview" class="mt-4"></div>
                </div>
                <div class="flex justify-end">
                    <button 
                        type="submit"
                        class="px-6 py-2 bg-gradient-to-r from-travel-blue to-travel-orange text-white rounded-lg hover:shadow-lg transition duration-300"
                    >
                        Post
                    </button>
                </div>
            </form>
        </div>

        <!-- Posts Feed -->
        <div id="postsFeed" class="space-y-8">
            <!-- Posts will be loaded here -->
        </div>
    </main>