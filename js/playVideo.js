document.addEventListener('DOMContentLoaded', () => {
    // Function to initialize video players
    function initializeVideoPlayers() {
        // Get all video elements on the page
        const videos = document.querySelectorAll('video');
        
        videos.forEach(video => {
            // Add controls to the video if not already present
            if (!video.hasAttribute('controls')) {
                video.setAttribute('controls', '');
            }

            // Add event listeners for video events
            video.addEventListener('play', () => {
                console.log('Video started playing');
            });

            video.addEventListener('pause', () => {
                console.log('Video paused');
            });

            video.addEventListener('ended', () => {
                console.log('Video finished');
                // Optionally reset the video to start
                video.currentTime = 0;
            });

            // Error handling
            video.addEventListener('error', (e) => {
                console.error('Error playing video:', e);
            });

            // Add custom play method
            video.customPlay = function() {
                if (video.paused) {
                    video.play().catch(e => {
                        console.error('Error playing video:', e);
                    });
                } else {
                    video.pause();
                }
            };

            // Optional: Add click to play/pause functionality
            video.addEventListener('click', function() {
                this.customPlay();
            });
        });
    }

    // Initialize video players when the page loads
    initializeVideoPlayers();
});