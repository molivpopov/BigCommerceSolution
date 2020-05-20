$(document).ready(function () {

    $('.js-example-basic-multiple').select2({
        ajax: {
            url: 'ajax.php',
            dataType: 'json'
        }
    });

    $('.js-example-basic-single').select2({
        placeholder: 'Select an filter',
        tags: true
    });

});
