
(function( $ ) {
	'use strict';
	function init_get_destinations(station) {
				alert(station_id)
            $.getJSON(helper_vars.pluginurl+'api/timetable.php?station_from=766546', {},
                function (data) {

                  var trHTML = '';
                  $.each(data, function (i, item) {
										console.log(item.via)
									    var viaHTML = '';
                      $.each(item.via, function (i, viaVal) {
                        viaHTML += '<li>'+viaVal.city+'</li>';
                      })
                      trHTML += '<tr><td class="departure">' +
                                  date_format(Date.parse(item.via[0].time_from))+ '</td><td class="destinations">' +
                                  item.via[item.via.length - 1].city + '</td><td class="via"><ul>' +
                                  viaHTML + '</ul></td></tr>';
                  });
                  $('#departures_table tbody').append(trHTML);
                });

							$.getJSON(helper_vars.pluginurl+'api/timetable.php?station_to=766546', {},
	                function (data) {
	                  var trHTML = '';
	                  $.each(data, function (i, item) {
	                      var viaHTML = '';
	                      $.each(item.via, function (i, viaVal) {
	                        viaHTML += '<li>'+viaVal.city+'</li>';
	                      })
	                      trHTML += '<tr><td class="arrival">' +
	                                  date_format(Date.parse(item.via[0].time_from)) + '</td><td class="from">' +
	                                  item.via[item.via.length - 1].city + '</td><td class="via"><ul>' +
	                                  viaHTML + '</ul></td></tr>';
	                  });
	                  $('#arrivals_table tbody').append(trHTML);
	                });
}

function date_format(timestamp){
	var time = new Date(timestamp);
	var h = (time.getHours()<10?'0':'') + time.getHours()
	var m = (time.getMinutes()<10?'0':'') + time.getMinutes()
	return h+':'+m;
}

$(function () {
	init_get_destinations();
});


})( jQuery );
