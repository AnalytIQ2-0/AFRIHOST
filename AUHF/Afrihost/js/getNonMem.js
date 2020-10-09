window.addEventListener("load", function(){
    var urltable = new XMLHttpRequest();
    urltable.open('POST', "http://localhost/AUHF/Afrihost/PHPs/getNonMembers.php");
    urltable.onload = function () {
      var respondData = JSON.parse(urltable.responseText);
    //alert(respondData[0].member_id);
      var hold = respondData[0].member_id;
      if(hold.localeCompare("false")){
        loadmemberTable(respondData);
      }else{
        //alert("No non members available!");
        document.getElementById('memTable').style.visibility="none";
        document.getElementById('tableSearch').style.display="none";
        document.getElementById('ptip').style.display="none";
        document.getElementById('displayNon').innerHTML="<h2>No none members available!</h2>";
      }
    };
    urltable.send();
});

var postedJobs = document.getElementById("tableBody");

 function loadmemberTable(res) {
    var  htmlString ="";
            for (var i = 0; i < res.length; i++) {

                htmlString += '<tr class="tablerow"><td class="col1" onclick="parseMemberId()"><a href="viewNonMember.html">' + parseInt(res[i].member_id) +
                    '</a></td><td class="col2">' + res[i].member_title +
                    '</td><td class="col3">' + res[i].member_fname + " "+ res[i].member_lname +                    
                    '</td><td class="col5">' + res[i].member_country +
                    '</td><td class="col4">' + res[i].member_contactNo +
                    '</td><td class="col6">' + res[i].member_email +
                    '</td></tr>';
               }
           postedJobs.insertAdjacentHTML('beforeend', htmlString);

 }
