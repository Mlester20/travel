fetch('controllers/fetchProfile.php')
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success'){
            document.getElementById('profileName').textContent = data.data.name;
            document.getElementById('profileBio').textContent = data.data.bio || '';
        }
    })
    .catch(error => {
        console.error('Error fetching profile:', error);
        document.getElementById('profileName').textContent = 'Error loading profile';
        document.getElementById('profileBio').textContent = '';
        'Error loading bio';
        document.getElementById('profileEmail'.textContent = '');
    })