<?php
require 'includes/config.php';
session_start();

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
    <title>Vlogs | <?php include 'includes/title.php'; ?> </title>
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
    

    <?php include 'components/header.php'; ?>

    <?php include 'components/postVlogUI.php'; ?>

    <script>
        // Handle image preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            imagePreview.innerHTML = '';
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.innerHTML = `
                        <div class="relative">
                            <img src="${e.target.result}" class="w-full h-64 object-cover rounded-lg">
                        </div>
                    `;
                }
                reader.readAsDataURL(file);
            }
        });

        // Handle form submission
        document.getElementById('createPostForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append('action', 'create_post');
            formData.append('title', this.title.value);
            formData.append('description', this.description.value);
            formData.append('image', imageInput.files[0]);

            try {
                const response = await fetch('controllers/vlogsController.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();
                
                if (result.status === 'success') {
                    this.reset();
                    imagePreview.innerHTML = '';
                    loadPosts();
                }
                alert(result.message);
            } catch (error) {
                console.error('Error:', error);
                alert('Error creating post');
            }
        });

        // Load posts
        async function loadPosts() {
            try {
                const response = await fetch('controllers/vlogsController.php');
                const result = await response.json();
                
                if (result.status === 'success') {
                    const postsFeed = document.getElementById('postsFeed');
                    postsFeed.innerHTML = result.data.map(post => `
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-gradient-to-br from-travel-blue to-travel-orange rounded-full flex items-center justify-center text-white font-bold">
                                        ${post.author_name.charAt(0)}
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="font-semibold text-gray-800">${post.author_name}</h3>
                                        <p class="text-sm text-gray-600">${new Date(post.posted_at).toLocaleDateString()}</p>
                                    </div>
                                </div>
                                <h2 class="text-xl font-bold text-gray-800 mb-2">${post.title}</h2>
                                <p class="text-gray-800 mb-4">${post.description}</p>
                                <img src="${post.image_path}" class="w-full h-96 object-cover rounded-lg">
                                
                            </div>
                        </div>
                    `).join('');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }

        // Initial load
        loadPosts();
    </script>
</body>
</html>