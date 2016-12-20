
(function( $ ) {
	'use strict';
	var initial_place_id = null;
	var main_current_language = 'en';
	function init_place_selects(place_from_id, place_to_id) {
    var $select_place_from = $("#select_place_from");
    var $select_place_to = $("#select_place_to");

    $select_place_from.select2({
        minimumInputLength: 3,
        ajax: {
            url: helper_vars.pluginurl+"api/origin.php",
            dataType: 'json',
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                };
            },

            processResults: function (data, page) {
                var places_from = [];
                $.each(data, function (idx, value) {
                    places_from.push({id: value.id, text: value['city' + '_' + main_current_language]});
                });

                return {
                    results: places_from
                };
            },
            cache: true
        }

    }).one('select2-focus', select2Focus).on("select2-blur", function () {
        $(this).one('select2-focus', select2Focus)
    });


    $select_place_from.on("change", function (e) {
        update_destination_select($(this).val(), place_to_id);
    });

    $('select').on('focus', function () {
        console.log('focus');
    });

    $select_place_to.select2().one('select2-focus', select2Focus).on("select2-blur", function () {
        $(this).one('select2-focus', select2Focus)
    });


    $("#passenger_count").select2({
        minimumResultsForSearch: Infinity
    });

    if (place_from_id) {
        initial_place_id = place_from_id;
        $.getJSON(helper_vars.pluginurl+'api/origin.php?' + place_from_id + '/', {},
            function (place) {
                var option = new Option(place['city' + '_' + main_current_language], place.id, true, true);
                $select_place_from.append(option);
                $select_place_from.trigger("change");
            });
    }

}


function select2Focus() {
    var select2 = $(this).data('select2');
    setTimeout(function () {
        if (!select2.opened()) {
            select2.open();
        }
    }, 0);
}

function update_destination_select(place_from_id, place_to_id) {
    var places_to = [];
    var $select_place_to = $("#select_place_to");
    $select_place_to.val('');
    $select_place_to.empty();
    $.getJSON(helper_vars.pluginurl+'api/destinations.php?id=' + place_from_id + '/', {},
        function (places) {
            $.each(places, function (idx, value) {
                places_to.push({id: value.id, text: value['city' + '_' + main_current_language]});
            });
            $select_place_to.select2({
                data: places_to
            });
            if (place_to_id) {
                $select_place_to.val(place_to_id).trigger("change");
            } else {
                $select_place_to.val('').trigger("change");
            }
            $select_place_to.select2('enable');
            // if (!initial_place_id) {
            //     $select_place_to.select2('open');
            // }
        });

}

function init_search_datepickers(date_from, date_to) {
	var main_current_language = 'en';
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#date_from').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: main_current_language,
        minDate: now,
		widgetPositioning: {
			vertical: 'bottom'
		},
		icons: {
			previous: 'chevron-left',
            next: 'chevron-right',
		},
		//debug: true,
    });
    checkin.on('dp.change', function (e) {
        checkout.data('DateTimePicker').minDate(e.date);
        checkin.data('DateTimePicker').hide();
    });
    var checkout = $('#date_to').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: main_current_language,
        minDate: now,
		widgetPositioning: {
			vertical: 'bottom'
		},
		icons: {
			previous: 'chevron-left',
            next: 'chevron-right',
		},
    });

    checkout.on('dp.change', function (e) {
        checkin.data('DateTimePicker').maxDate(e.date);
        checkout.data('DateTimePicker').hide();
    }).data('datepicker');

    if (date_from) {
        $("#date_from").val(date_from);
    }
    if (date_to) {
        $("#date_to").val(date_to);
    }
}
$(function () {
	init_search_datepickers();
	init_place_selects();
	init_elements();
	init_checkbox();
});

function init_passenger_count(passenger_count) {
    $("#passenger_count").select2("val", passenger_count);
}
function init_elements() {
    $('#search-button').click(function () {
        $(this).addClass('btn-activated')
    });
}
function select2Focus() {
    var select2 = $(this).data('select2');
    setTimeout(function() {
        if (!select2.opened()) {
            select2.open();
        }
    }, 0);
}

function init_checkbox(){
    var checkbox = $("#open_return");
    checkbox.change(function(){
        if(this.checked) {
            $("#date_to").attr("disabled", "disabled");
        }
        else{
            $("#date_to").removeAttr("disabled", "disabled");
        }
    });
}


})( jQuery );
