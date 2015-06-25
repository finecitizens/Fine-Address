$('.fine-address-field-group').each(function () {
    $(this).closest('.input').prev('.heading').find('label').toggleClass('-fine-address-header', true);
});
$('body').on('click', '.fine-address-field-group .js-generate-cords', function(e) {
    var group = $(e.target).closest('.fine-address-field-group'),
        address1 = group.find('.js-fine-address-address1').val(),
        address2 = group.find('.js-fine-address-address2').val(),
        city = group.find('.js-fine-address-city').val(),
        state = group.find('.js-fine-address-state').val(),
        zip = group.find('.js-fine-address-zip').val(),
        lat = group.find('.js-fine-address-lat'),
        lng = group.find('.js-fine-address-lng'),
        querystring = encodeURIComponent($.trim(address1 + " " + address2) + ", " + city + ", " + state + ", " + zip);
        $.ajax({
            url: "https://maps.googleapis.com/maps/api/geocode/json?address="+querystring
        }).done(function(d) {
            if (d.results.length < 1) {
                alert('This address returned 0 results. Please validate the address is correct and try again. If the problem persists, you may have to enter the longitude and latitude manually.');
                return;
            }
            lat.val(d.results[0].geometry.location.lat);
            lng.val(d.results[0].geometry.location.lng);
        }).fail(function(d, e) {
            alert('Unable to generate longitude and latitude. If the problem persists, you may have to enter the longitude and latitude manually.');
        });
});
