function searchUsers(query) {
    const searchResults = document.getElementById('searchResults');
    
    // If query is empty, hide the results
    if (!query.trim()) {
        searchResults.classList.add('hidden');
        return;
    }

    // Make AJAX request to search users
    fetch('controllers/searchUsers.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `query=${encodeURIComponent(query)}`
    })
    .then(response => response.json())
    .then(users => {
        // Clear previous results
        searchResults.innerHTML = '';
        
        if (users.length === 0) {
            searchResults.innerHTML = '<div class="px-4 py-2 text-gray-500">No users found</div>';
        } else {
            users.forEach(user => {
                const userElement = document.createElement('a');
                userElement.href = `profile.php?id=${user.user_id}`;
                userElement.className = 'flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer';
                
                // Create user card HTML
                userElement.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <img src="${user.profile || 'public/images/default-avatar.png'}" 
                             alt="${user.name}" 
                             class="w-10 h-10 rounded-full object-cover">
                        <div>
                            <div class="font-medium text-gray-900">${user.name}</div>
                        </div>
                    </div>
                `;
                
                searchResults.appendChild(userElement);
            });
        }
        
        // Show results
        searchResults.classList.remove('hidden');
    })
    .catch(error => {
        console.error('Error searching users:', error);
        searchResults.innerHTML = '<div class="px-4 py-2 text-red-500">Error searching users</div>';
        searchResults.classList.remove('hidden');
    });
}

// Close search results when clicking outside
document.addEventListener('click', (event) => {
    const searchResults = document.getElementById('searchResults');
    const searchInput = document.getElementById('searchPeople');
    
    if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
        searchResults.classList.add('hidden');
    }
});