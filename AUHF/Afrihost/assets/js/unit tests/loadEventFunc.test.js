const {loadEventTable, checkData} =require("./loadMemberFunc");

test("Should return a table of all events.", ()=>{
    var testData = '{"event_id":"15870","event_name":"Save the elephants","event_date":"2020/11/23","event_startTime":"17:00:00","event_endTime":"20:00:00","event_venueName":"Mystic Grill","event_city":"Eastern Cape"}';
    const resultObject = JSON.parse(testData);
    var returnStr = checkData(resultObject);

    var htmlString = '<tr class="tablerow"><td class="col1" onclick="parseEventId()">' + "15870" +
            '</td><td class="col1">' + "Save the elephants" +
            '</td><td class="col3">' + "2020/11/23" +
            '</td><td class="col4">' + "17:00:00" + " - "+ "20:00:00" +
            '</td><td class="col3">' + "Mystic Grill" +
            '</td><td class="col4">' + "Eastern Cape" +
            '</td></tr>';
       expect(returnStr).toBe(htmlString);
});

