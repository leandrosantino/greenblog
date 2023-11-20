//Function to toggle password visibility

function togglePW() {
    
    var password = document.querySelector('[name=password]');
    var eyeIcon = document.getElementById('font');

    if (password.getAttribute('type') === 'password') {
        password.setAttribute('type', 'text');
        eyeIcon.classList.add('visible-password');
    } else {
        password.setAttribute('type', 'password');
        eyeIcon.classList.remove('visible-password');
    }
}