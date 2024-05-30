document.addEventListener('DOMContentLoaded', function() {
    var profilePic = document.getElementById('profile-pic');
    var profileMenu = document.getElementById('profile-menu');
    
    profilePic.addEventListener('click', function() {
        if (profileMenu.style.display === 'none' || profileMenu.style.display === '') {
            profileMenu.style.display = 'block';
        } else {
            profileMenu.style.display = 'none';
        }
    });
});