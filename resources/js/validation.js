const validator = document.querySelectorAll('.validate');

for (let i = 0; i < validator.length; i++) {
    validator[i].addEventListener('click', function(event) {
        event.preventDefault();
        const choice = confirm(this.getAttribute('data-confirm'));
        if (choice) {
            this.form.submit();
        }
    });
}