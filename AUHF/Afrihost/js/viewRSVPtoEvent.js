window.addEventListener("load", function(){
    var urltable = new XMLHttpRequest();
    var eventId = parseInt(sessionStorage.getItem("eventId"));
    urltable.open('POST', "http://localhost/AUHF/Afrihost/PHPs/viewRSVPedtoEvent.php/?event_id="+eventId);
    urltable.onload = function () {
      //alert(urltable.responseText);
        var respondData = JSON.parse(urltable.responseText);
        loadEventTable(respondData);
    };
    urltable.send();
});

var events = document.getElementById("tableBody");

 function loadEventTable(res) {
    var  htmlString ="";
            for (var i = 0; i < res.length; i++) {

                htmlString += '<tr class="tablerow"><td class="col1" onclick="parseEventId()">' + parseInt(res[i].event_id) +
                    '</td><td class="col1">' + res[i].event_name +
                    '</td><td class="col3">' + res[i].member_name +
                    '</td><td class="col4">' + res[i].rsvp_desc +
                    '</td><td class="col3">' + res[i].member_email +
                    '</td><td class="col4">' + res[i].member_contactNo +
                    '</td><td class="col4">' + res[i].rsvp_date +
                    '</td></tr>';
               }
           events.insertAdjacentHTML('beforeend', htmlString);

 }
