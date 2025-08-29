// Fetch current settings
fetch('controllers/fetchSettings.php')
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Populate form fields
            document.getElementById('name').value = data.data.name || '';
            document.getElementById('email').value = data.data.email || '';
            document.getElementById('bio').value = data.data.bio || '';
        }
    })
    .catch(error => console.error('Error:', error));

// Save settings function
function saveSettings() {
    const profileData = new FormData(document.getElementById('profileForm'));
    const accountData = new FormData(document.getElementById('accountForm'));

    // Combine form data
    const formData = new FormData();
    for (let [key, value] of profileData.entries()) formData.append(key, value);
    for (let [key, value] of accountData.entries()) formData.append(key, value);

    // Send to server
    fetch('controllers/fetchSettings.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Settings saved successfully!');
            } else {
                alert('Error saving settings: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving settings. Please try again.');
        });
}
