document.addEventListener('scroll', () => {
    const elements = document.querySelectorAll('.glass');
    elements.forEach(element => {
        const position = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.2;
        if (position < screenPosition) {
            element.classList.add('appear');
        } else {
            element.classList.remove('appear');
        }
    });
});
