// Members (Unit test)
function loadmemberTable(res){
    var  htmlString ="";
            for (var i = 0; i < 1; i++) {

                htmlString += '<tr class="tablerow"><td class="col1" onclick="parseMemberId()">' + res.member_id +
                    '</td><td class="col2">' + res.member_title +
                    '</td><td class="col3">' + res.member_fname + " "+ res.member_lname +
                    '</td><td class="col4">' + res.member_companyName +
                    '</td><td class="col5">' + res.member_country +
                    '</td><td class="col6">' + res.member_email +
                    '</td><td class="col7">' + res.member_status +
                    '</td></tr>';
               }
               return htmlString;
 }
exports.loadmemberTable = loadmemberTable;

//Events (Unit test)
function loadEventTable(res) {
    
    var  htmlString ="",str = "";
            for (var i = 0; i < 1; i++) {

                htmlString += '<tr class="tablerow"><td class="col1" onclick="parseEventId()">' + res.event_id +
                    '</td><td class="col1">' + res.event_name +
                    '</td><td class="col3">' + res.event_date +
                    '</td><td class="col4">' + res.event_startTime + " - "+ res.event_endTime +
                    '</td><td class="col3">' + res.event_venueName +
                    '</td><td class="col4">' + res.event_city +
                    '</td></tr>';
               }
           return htmlString;

 }
 exports.loadEventTable = loadEventTable;

 //input validation &&  integration test
const validateInput = (text)=>{
    if(!text){
        return false;
    }
    if(Number.isInteger(text) && +text === NaN){
        return false;
    }
    return true;
};
exports.validateInput = validateInput;

function checkData (data){
    if(data.member_id){
        if(!validateInput(data.member_id) || !validateInput(data.member_fname) || !validateInput(data.member_lname) || !validateInput(data.member_title) || !validateInput(data.member_email) || !validateInput(data.member_country)){
            return false;
        }else{
            return loadmemberTable(data);
        }
    }else{
        if(!validateInput(data.event_id) || !validateInput(data.event_name) || !validateInput(data.event_date) || !validateInput(data.event_startTime) || !validateInput(data.event_endTime)|| !validateInput(data.event_venueName) || !validateInput(data.event_city)){
            return false;
        }else{
            return loadEventTable(data);
        }
    }
}
exports.checkData = checkData;