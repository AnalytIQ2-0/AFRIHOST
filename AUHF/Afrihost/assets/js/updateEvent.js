window.addEventListener("load", function(){
    var urlform = new XMLHttpRequest();
    var even_id = sessionStorage.getItem("eventId");

    urlform.open('GET', "http://localhost/AUHF/Afrihost/PHPs/getEventData.php/?event_id="+even_id);
    urlform.onload = function () {
        var Data = JSON.parse(urlform.responseText);
        loadEventData(Data);
    };
    urlform.send();
});

function loadEventData(Edata){

    for(i = 0;i < Edata.length; i++){

        var id = Edata[i].event_id;
        var name = Edata[i].event_name;
        var date = Edata[i].event_date;
        var start = Edata[i].event_startTime;
        var end = Edata[i].event_endTime;
        var desc = Edata[i].event_description;
        var venue = Edata[i].event_venueName;
        var str = Edata[i].event_strAddress;
        var sub = Edata[i].event_suburb;
        var city = Edata[i].event_city;
        var prov = Edata[i].event_province;
        var country = Edata[i].event_country;

        document.getElementById('eventId').value = id;
        document.getElementById('eventName').value = name;
        document.getElementById('eventDate').value = date;
        document.getElementById('eventStart').value = start;
        document.getElementById('eventEnd').value = end;
        document.getElementById('eventDesc').value = desc;
        document.getElementById('eventVenue').value = venue;
        document.getElementById('eventStr').value = str;
        document.getElementById('eventSuburb').value = sub;
        document.getElementById('eventCity').value = city;
        document.getElementById('eventProvince').value = prov;
        document.getElementById('eventCountry').value = country;
    }

}
