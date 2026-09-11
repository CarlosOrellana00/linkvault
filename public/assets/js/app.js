document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | FILTROS
    |--------------------------------------------------------------------------
    */

    const categoryFilter = document.getElementById('categoryFilter');
    const favoriteFilter = document.getElementById('favoriteFilter');

    const rows = document.querySelectorAll('.links-table tbody tr');


    function filterLinks() {

        const selectedCategory = categoryFilter
            ? categoryFilter.value
            : 'all';

        const onlyFavorites = favoriteFilter
            ? favoriteFilter.checked
            : false;


        rows.forEach(function (row) {

            const rowCategory = row.dataset.category;
            const rowFavorite = row.dataset.favorite;

            const matchesCategory =
                selectedCategory === 'all' ||
                rowCategory === selectedCategory;

            const matchesFavorite =
                !onlyFavorites ||
                rowFavorite === '1';


            if (matchesCategory && matchesFavorite) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }


    if (categoryFilter) {

        categoryFilter.addEventListener('change', filterLinks);

    }


    if (favoriteFilter) {

        favoriteFilter.addEventListener('change', filterLinks);

    }


    /*
    |--------------------------------------------------------------------------
    | MODAL DE ELIMINACIÓN
    |--------------------------------------------------------------------------
    */

    const deleteButtons = document.querySelectorAll('.delete-button');

    const deleteModal = document.getElementById('deleteModal');
    const deleteLinkTitle = document.getElementById('deleteLinkTitle');
    const deleteLinkId = document.getElementById('deleteLinkId');

    const cancelDelete = document.getElementById('cancelDelete');


    deleteButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            const linkId = button.dataset.id;
            const linkTitle = button.dataset.title;

            deleteLinkTitle.textContent = linkTitle;
            deleteLinkId.value = linkId;

            deleteModal.classList.add('active');
            deleteModal.setAttribute('aria-hidden', 'false');

        });

    });


    if (cancelDelete) {

        cancelDelete.addEventListener('click', function () {

            deleteModal.classList.remove('active');
            deleteModal.setAttribute('aria-hidden', 'true');

        });

    }

});