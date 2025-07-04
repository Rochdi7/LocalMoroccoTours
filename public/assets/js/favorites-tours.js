(function($) {

    function getCookie(name) {
        let matches = document.cookie.match(
            new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)")
        );
        return matches ? decodeURIComponent(matches[1]) : null;
    }

    function setCookie(name, value, options = {}) {
        options = { path: '/', ...options };
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

    function loadFavorites() {
        let cookieName = `favorite_tours`;
        let favorites = getCookie(cookieName);
        if (favorites) {
            let ids = favorites.split(',');
            ids.forEach(id => {
                $(`.js-favorite-btn[data-type="tour"][data-id="${id}"]`).addClass('is-favorited');
            });
        }
    }

    function toggleFavorite($btn) {
        let id = $btn.data('id');
        let cookieName = `favorite_tours`;
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
        console.log('Tours favorites loaded');
        loadFavorites();

        $(document).on('click', '.js-favorite-btn[data-type="tour"]', function (e) {
            e.preventDefault();
            e.stopPropagation();
            toggleFavorite($(this));
        });
    });

})(jQuery);
