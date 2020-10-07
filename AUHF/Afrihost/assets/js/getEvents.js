window.addEventListener("load", function(){
    var urltable = new XMLHttpRequest();
    urltable.open('POST', "http://localhost/AUHF/Afrihost/PHPs/getEvents.php");
    urltable.onload = function () {
        var respondData = JSON.parse(urltable.responseText);
        loadEventTable(respondData);
    };
    urltable.send();
});

var events = document.getElementById("tableBody");

 function loadEventTable(res) {
    var  htmlString ="";
            for (var i = 0; i < res.length; i++) {

                htmlString += '<tr class="tablerow"><td class="col1" onclick="parseEventId()"><a href="updateEvent.html">' + parseInt(res[i].event_id) +
                    '</a></td><td class="col1">' + res[i].event_name +
                    '</td><td class="col3">' + res[i].event_date +
                    '</td><td class="col4">' + res[i].event_startTime + " - "+ res[i].event_endTime +
                    '</td><td class="col3">' + res[i].event_venueName +
                    '</td><td class="col4">' + res[i].event_city +
                    '</td></tr>';
               }
           events.insertAdjacentHTML('beforeend', htmlString);

 }
