(function() {
    $('.category_tree.toggle_parents > li > a')
        .on('click', function() {
            console.log(this);
            if ($(this).attr('href') !== undefined &&
                $(this).attr('href') != '#') return true;

            $('.category_tree.toggle_parents .collapse.show')
                .collapse('hide');
            $(this).parent()
                .find('ul')
                .collapse('show');

            return false;
        });
})();