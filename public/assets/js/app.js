document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | FILTROS
    |--------------------------------------------------------------------------
    */

    const categoryFilter = document.getElementById('categoryFilter');
    const favoriteFilter = document.getElementById('favoriteFilter');
    const searchFilter = document.getElementById('searchFilter');

    const rows = document.querySelectorAll('.links-table tbody tr');


    function filterLinks() {

        const selectedCategory = categoryFilter
            ? categoryFilter.value
            : 'all';

        const onlyFavorites = favoriteFilter
            ? favoriteFilter.checked
            : false;

        const searchText = searchFilter
            ? searchFilter.value.toLowerCase().trim()
            : '';

        rows.forEach(function (row) {

            const rowCategory = row.dataset.category;
            const rowFavorite = row.dataset.favorite;
            const rowSearch = row.dataset.search || '';

            const matchesCategory =
                selectedCategory === 'all' ||
                rowCategory === selectedCategory;

            const matchesFavorite =
                !onlyFavorites ||
                rowFavorite === '1';

            const matchesSearch =
                searchText === '' ||
                rowSearch.includes(searchText);

            if (matchesCategory && matchesFavorite && matchesSearch){

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

    if (searchFilter) {

        searchFilter.addEventListener('input', filterLinks);

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