(function($) {

    /**
     * Get the value of a cookie
     * @param {string} name
     * @returns {string|null}
     */
    function getCookie(name) {
        let matches = document.cookie.match(
            new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)")
        );
        return matches ? decodeURIComponent(matches[1]) : null;
    }

    /**
     * Set a cookie
     * @param {string} name
     * @param {string} value
     * @param {object} options
     */
    function setCookie(name, value, options = {}) {
        options = {
            path: '/',
            ...options
        };

        if (options.expires instanceof Date) {
            options.expires = options.expires.toUTCString();
        }

        let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);

        for (let optionKey in options) {
            updatedCookie += "; " + optionKey;
            let optionValue = options[optionKey];
            if (optionValue !== true) {
                updatedCookie += "=" + optionValue;
            }
        }

        document.cookie = updatedCookie;
    }

    /**
     * Load favorites from cookies and add .is-favorited class
     */
    function loadFavorites() {
        ['tour', 'activity', 'trekking'].forEach(function(type) {
            let cookieName = `favorite_${type}s`;
            let favorites = getCookie(cookieName);
            if (favorites) {
                let ids = favorites.split(',');
                ids.forEach(id => {
                    $(`.js-favorite-btn[data-type="${type}"][data-id="${id}"]`).addClass('is-favorited');
                });
            }
        });
    }

    /**
     * Toggle favorite state for a given button
     * @param {jQuery} $btn
     */
    function toggleFavorite($btn) {
        let id = $btn.data('id');
        let type = $btn.data('type');
        let cookieName = `favorite_${type}s`;

        let favorites = getCookie(cookieName);
        let ids = favorites ? favorites.split(',') : [];

        if (ids.includes(id.toString())) {
            ids = ids.filter(itemId => itemId !== id.toString());
            $btn.removeClass('is-favorited');
        } else {
            ids.push(id.toString());
            $btn.addClass('is-favorited');
        }

        if (ids.length > 0) {
            setCookie(cookieName, ids.join(','), {expires: 365});
        } else {
            setCookie(cookieName, '', {expires: -1});
        }
    }

    $(document).ready(function () {
        console.log('Favorites system loaded!');
        loadFavorites();

        $(document).on('click', '.js-favorite-btn', function (e) {
            console.log('Favorite button clicked');
            e.preventDefault();
            e.stopPropagation();
            toggleFavorite($(this));
        });
    });

})(jQuery);
