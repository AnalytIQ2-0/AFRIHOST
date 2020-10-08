
window.addEventListener("load", function(){
    var urlform = new XMLHttpRequest();
    var mem_id = sessionStorage.getItem("memberId");
    //alert(mem_id);
    urlform.open('GET', "http://localhost/AUHF/Afrihost/PHPs/getMemberData.php/?member_id="+parseInt(mem_id));
    urlform.onload = function () {
        var resData = JSON.parse(urlform.responseText);
        loadMemberData(resData);
    };
    urlform.send();
});

function loadMemberData(Sdata){

    var hold = "";
    hold = Sdata[0].member_id;
    //memid.insertAdjacentHTML('beforeend', htmlstr);
    //alert(hold);
      if (!hold.localeCompare("false")) {
        alert("Could not find member.");
      }else{

        for(i = 0;i < Sdata.length; i++){

            var memberID = Sdata[i].member_id;
            var  fname = Sdata[i].member_fname;
            var  lname = Sdata[i].member_lname;
            var  title = Sdata[i].member_title;
            var  status = Sdata[i].member_status;
            var  joinDate = Sdata[i].member_joinDate;
            var  country = Sdata[i].member_country;
            var  company = Sdata[i].member_companyName;
            var  compSize = Sdata[i].member_companySize;
            var  city = Sdata[i].member_city;
            var phone = Sdata[i].member_contactNo;
            var email = Sdata[i].member_email;

            document.getElementById("Memberid").setAttribute('value',memberID);
            document.getElementById("lName").value = lname;
            document.getElementById("fName").value = fname;
            document.getElementById("title").value= title;
            document.getElementById("status").value = status;
            document.getElementById("joinDate").value =joinDate;
            document.getElementById("country").value = country;
            document.getElementById("companyName").value = company;
            document.getElementById("companySize").setAttribute('value',compSize);
            document.getElementById("city").setAttribute('value',city);
            document.getElementById("contactNo").setAttribute('value',phone);
            document.getElementById("Email").setAttribute('value',email);


        }

    }

}
