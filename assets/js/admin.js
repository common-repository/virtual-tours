window.addEventListener('load', function () {
    const copyButtons = document.querySelectorAll('.copy_shortcode_button');

    copyButtons.forEach((button) => {
        button.addEventListener('click', () => {
            button.children[0].select(); 
            navigator.clipboard.writeText(button.children[0].value);
        });
      });
})