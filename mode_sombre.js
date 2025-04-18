document.addEventListener("DOMContentLoaded", () => {
        const toggleButton = document.getElementById('bouton-mode');
        const html = document.documentElement;

        // Lire un cookie spécifique
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        // Écrire un cookie (valable 1 an)
        function setCookie(name, value, days = 365) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = `${name}=${value}; ${expires}; path=/`;
        }

        function updateButtonText() {
            toggleButton.textContent = html.classList.contains('dark-mode')
                ? 'Mode clair'
                : 'Mode sombre';
        }

        // Appliquer le thème au chargement si cookie présent
        const theme = getCookie('theme');
        if (theme === 'dark') {
            html.classList.add('dark-mode');
        }

        updateButtonText();

        toggleButton.addEventListener('click', () => {
            html.classList.toggle('dark-mode');
            const newTheme = html.classList.contains('dark-mode') ? 'dark' : 'light';
            setCookie('theme', newTheme);
            updateButtonText();
        });

    });