class PostFetcher {
    constructor() {
        this.apiUrl = '../controllers/fetchPost.php'; // Updated to match your path
        this.postsContainer = null;
        this.loadingState = false;
    }

    // Initialize the post fetcher
    init(containerId = 'posts-container') {
        this.postsContainer = document.getElementById(containerId);
        if (!this.postsContainer) {
            console.error('Posts container not found');
            return;
        }
        this.fetchPosts();
    }

    // Fetch posts from API
    async fetchPosts() {
        if (this.loadingState) return;
        
        this.setLoadingState(true);
        
        try {
            console.log('Fetching from:', this.apiUrl); // Debug log
            
            const response = await fetch(this.apiUrl, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
                credentials: 'same-origin' // Include session cookies
            });

            console.log('Response status:', response.status); // Debug log
            console.log('Response URL:', response.url); // Debug log

            if (!response.ok) {
                // Try to get error details
                const errorText = await response.text();
                console.error('Error response:', errorText);
                throw new Error(`HTTP error! status: ${response.status} - ${errorText}`);
            }

            const data = await response.json();
            console.log('Received data:', data); // Debug log
            
            if (data.success) {
                this.renderPosts(data.posts);
            } else {
                this.showError(data.error || 'Failed to fetch posts');
            }
        } catch (error) {
            console.error('Error fetching posts:', error);
            this.showError(`Network error: ${error.message}`);
        } finally {
            this.setLoadingState(false);
        }
    }

    // Render posts to the DOM
    renderPosts(posts) {
        if (!posts || posts.length === 0) {
            this.showEmptyState();
            return;
        }

        const postsHTML = posts.map(post => this.createPostHTML(post)).join('');
        this.postsContainer.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                ${postsHTML}
            </div>
        `;
    }

    // Create HTML for individual post
    createPostHTML(post) {
        const imageHTML = post.image_url 
            ? `<div class="h-48 bg-cover bg-center" style="background-image: url('${post.image_url}')"></div>`
            : `<div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500"></div>`;

        return `
            <div class="bg-gray-50 rounded-xl overflow-hidden shadow hover:shadow-md transition cursor-pointer" 
                 onclick="viewPost(${post.id})">
                ${imageHTML}
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 line-clamp-2">${this.escapeHTML(post.title)}</h3>
                    <p class="text-gray-600 text-sm mt-1 line-clamp-3">${this.escapeHTML(post.content)}</p>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center space-x-4 text-gray-600 text-sm">
                            <span class="flex items-center hover:text-blue-600 transition">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                </svg>
                                ${post.likes_count || 0}
                            </span>
                            <span class="flex items-center hover:text-green-600 transition">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                                </svg>
                                ${post.comments_count || 0}
                            </span>
                        </div>
                        <span class="text-gray-500 text-sm">${post.time_ago}</span>
                    </div>
                </div>
            </div>
        `;
    }

    // Show loading state
    setLoadingState(loading) {
        this.loadingState = loading;
        if (loading) {
            this.postsContainer.innerHTML = `
                <div class="flex items-center justify-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600"></div>
                    <span class="ml-3 text-gray-600">Loading posts...</span>
                </div>
            `;
        }
    }

    // Show empty state
    showEmptyState() {
        this.postsContainer.innerHTML = `
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15" />
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No posts yet</h3>
                <p class="mt-1 text-gray-500">Get started by creating your first post.</p>
                <div class="mt-6">
                    <button onclick="createNewPost()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Create Post
                    </button>
                </div>
            </div>
        `;
    }

    // Show error message
    showError(message) {
        this.postsContainer.innerHTML = `
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="flex">
                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Error loading posts</h3>
                        <p class="mt-1 text-sm text-red-700">${message}</p>
                        <button onclick="postFetcher.fetchPosts()" class="mt-2 text-sm text-red-800 underline hover:text-red-900">
                            Try again
                        </button>
                    </div>
                </div>
            </div>
        `;
    }

    // Utility function to escape HTML
    escapeHTML(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Test different paths to find the correct one
    testPaths() {
        const possiblePaths = [
            '../controllers/fetchPost.php',
            'controllers/fetchPost.php',
            './controllers/fetchPost.php',
            '../fetchPost.php',
            'fetchPost.php',
            './fetchPost.php'
        ];
        
        console.log('Testing possible paths...');
        
        possiblePaths.forEach(async (path, index) => {
            try {
                const response = await fetch(path, { method: 'HEAD' });
                console.log(`Path ${index + 1}: ${path} - Status: ${response.status}`);
                if (response.status !== 404) {
                    console.log(`✅ Found working path: ${path}`);
                }
            } catch (error) {
                console.log(`Path ${index + 1}: ${path} - Error: ${error.message}`);
            }
        });
    }

    // Refresh posts
    refresh() {
        this.fetchPosts();
    }
}

// Global functions that can be called from HTML
function viewPost(postId) {
    // Implement post viewing logic
    console.log('Viewing post:', postId);
    // You can redirect to post detail page or open modal
    // window.location.href = `post.php?id=${postId}`;
}

function createNewPost() {
    // Implement create post logic
    console.log('Creating new post');
    // window.location.href = 'create-post.php';
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    window.postFetcher = new PostFetcher();
    
    // Add path testing - remove this after finding correct path
    console.log('Current page URL:', window.location.href);
    postFetcher.testPaths();
    
    // Initialize normally
    window.postFetcher.init('posts-container');
});

// Export for module use if needed
if (typeof module !== 'undefined' && module.exports) {
    module.exports = PostFetcher;
}