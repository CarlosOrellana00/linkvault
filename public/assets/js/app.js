document.addEventListener('DOMContentLoaded', function () {

    const categoryFilter = document.getElementById('categoryFilter');
    const rows = document.querySelectorAll('.links-table tbody tr');

    if (!categoryFilter) {
        return;
    }

    categoryFilter.addEventListener('change', function () {

        const selectedCategory = categoryFilter.value;

        rows.forEach(function (row) {

            const rowCategory = row.dataset.category;

            if (
                selectedCategory === 'all' ||
                rowCategory === selectedCategory
            ) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });

    });

});