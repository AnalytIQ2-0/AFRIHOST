window.addEventListener("load", function(){
    var urltable = new XMLHttpRequest();
    urltable.open('POST', "http://localhost/github/AUHF/Afrihost/PHPs/getMembers.php");
    urltable.onload = function () {
        var respondData = JSON.parse(urltable.responseText);
        loadmemberTable(respondData);
    };
    urltable.send();
});

var postedJobs = document.getElementById("tableBody");

 function loadmemberTable(res) {
    var  htmlString ="";
            for (var i = 0; i < res.length; i++) {

                htmlString += '<tr class="tablerow"><td class="col1" onclick="parseMemberId()"><a href="updateMember.html">' + parseInt(res[i].member_id) +
                    '</a></td><td class="col2">' + res[i].member_title +
                    '</td><td class="col3">' + res[i].member_fname + " "+ res[i].member_lname +
                    '</td><td class="col4">' + res[i].member_companyName +
                    '</td><td class="col5">' + res[i].member_country +
                    '</td><td class="col6">' + res[i].member_email +
                    '</td><td class="col7">' + res[i].member_status +
                    '</td></tr>';
               }
           postedJobs.insertAdjacentHTML('beforeend', htmlString);

 }
