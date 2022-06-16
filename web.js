const togglePassword = document.querySelector('#togglePassword');
const ctogglePassword = document.querySelector('#ctogglePassword');
const password = document.querySelector('#password');
const cpassword = document.querySelector('#cpassword');


togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
});

ctogglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    cpassword.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

