
window.addEventListener("load",function(){
    var memberID = sessionStorage.getItem("Member_ID");
    var convoRequest = new XMLHttpRequest();
    convoRequest.open('GET','http://localhost/AUHF/Afrihost/PHPs/getConvos.php?member_id='+memberID);
    convoRequest.onload = function(){
        var result = JSON.parse(convoRequest.responseText);
        HtmlOutput(result);
        
    };
    convoRequest.send();
});

var displayConvos = document.getElementById('tableBody');

function HtmlOutput(data){
  var htmlString="",hold="";

  hold=data[0].corres_id;
  //alert(hold);
  if(!hold.localeCompare("false")){
    htmlString="No conversations available";
  }else{
    for(i =0; i <data.length;i++){
      htmlString += '<tr><td class=col1 onclick="parseConvoId()"><a href="viewCorres.html" >'+data[i].corres_id+
      '</a></td><td class="col1">'+data[i].corres_subject+
      '</td><td class="col4">'+data[i].corres_date+
      '</td></tr>';
    }
  }
  displayConvos.insertAdjacentHTML('beforeend',htmlString);
}