window.addEventListener("load",function(){
    var urlRe = new XMLHttpRequest();
    urlRe.open("GET","http://localhost/github/AUHF/Afrihost/PHPs/listMembers.php");
    urlRe.onload = function(){
    var r = JSON.parse(urlRe.responseText);
    HtmlOutput(r);
    };
    urlRe.send();
});

var displayMembers = document.getElementById('displayMembers');
function HtmlOutput(data){
  var htmlString="",hold="";

  hold=data[0].member_id;
  //alert(hold);
  if(!hold.localeCompare("false")){
    htmlString="No members available";
  }else{
    for(i =0; i <data.length;i++){
      htmlString += '<tr><td class=col1 onclick="parseMid()"><a href="viewCorres.html" >'+data[i].member_id+
      '</a></td><td class="col2">'+data[i].member_fname+
      '</td><td class="col3">'+data[i].member_lname+
      '</td><td class="col3">'+data[i].member_email+
      '</td><td class="col3">'+data[i].member_contactNo+
      '</td><td class="col3">'+data[i].member_country+
      '</td><td class="col4">'+data[i].member_status+
      '</td></tr>';
    }
  }
  displayMembers.insertAdjacentHTML('beforeend',htmlString);
}
