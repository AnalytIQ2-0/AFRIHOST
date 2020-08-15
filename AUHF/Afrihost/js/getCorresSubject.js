

var displayCorresSubject = document.getElementById('displayCorresSubject');
window.addEventListener("load",function(){
var memberID = sessionStorage.getItem("Member_ID");
var recent = new XMLHttpRequest();
recent.open('GET','http://localhost/github/AUHF/Afrihost/PHPs/getCorresSubject.php?member_ID='+memberID);
recent.onload = function(){
  var r = JSON.parse(recent.responseText);
  displayRecents(r);
};
recent.send();
});

function displayRecents(data){
  var htmlString="",hold="";
  hold=data[0].corres_subject;
  if(!hold.localeCompare("false")){
    htmlString+="<p>No Correspondences available</p>";
  }else{
    for(i =0; i <data.length;i++){
      htmlString += '<p>'+data[i].corres_subject+
      '</p><br><lablel>Date:</label><p>'+data[i].corres_date+'</p><br>';
    }
  }
  displayCorresSubject.insertAdjacentHTML('beforeend',htmlString);
}
