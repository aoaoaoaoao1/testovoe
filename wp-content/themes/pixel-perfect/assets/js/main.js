document.addEventListener('scroll', function() {
    var docHeight = document.documentElement.scrollHeight - window.innerHeight;
    var scrolled = (window.scrollY / docHeight) * 100;
    document.getElementById('progress-bar').style.width = scrolled + '%';
}); 