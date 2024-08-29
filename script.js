document.getElementById('show-signup').addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector('.login-form').style.display = 'none';
    document.querySelector('.signup-form').style.display = 'block';
});

document.getElementById('show-login').addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector('.signup-form').style.display = 'none';
    document.querySelector('.login-form').style.display = 'block';
});
