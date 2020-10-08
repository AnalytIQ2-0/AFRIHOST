if ("Member_ID" in sessionStorage){

var displayCorresSubject = document.getElementById('displayCorresSubject');
window.addEventListener("load",function(){
var memberID = sessionStorage.getItem("Member_ID");
var corresID = sessionStorage.getItem("conID");
var recent = new XMLHttpRequest();
recent.open('GET','http://localhost/AUHF/Afrihost/PHPs/getCorresSubject.php?member_ID='+memberID +'&corres_ID='+corresID);
recent.onload = function(){
  var r = JSON.parse(recent.responseText);
  displayRecents(r);
};
recent.send();
});
}else{
  
var displayCorresSubject = document.getElementById('displayCorresSubject');
window.addEventListener("load",function(){
var memberID = sessionStorage.getItem("memberId");
var corresID = sessionStorage.getItem("conID");
var recent = new XMLHttpRequest();
recent.open('GET','http://localhost/AUHF/Afrihost/PHPs/getCorresSubject.php?member_ID='+memberID +'&corres_ID='+corresID);
recent.onload = function(){
  var r = JSON.parse(recent.responseText);
  displayRecents(r);
};
recent.send();
});
}

function displayRecents(data){
  var htmlString="",hold="";
  hold=data[0].corres_subject;
  if(!hold.localeCompare("false")){
    htmlString+="<p>No Correspondences available</p>";
  }else{
    for(i =0; i <data.length;i++){
      htmlString += '<br><lablel>Subject:</lablel><p>'+data[i].corres_subject+
      '</p><br><lablel>Date:</label><p>'+data[i].corres_date+'</p><br>';
    }
  }
  displayCorresSubject.insertAdjacentHTML('beforeend',htmlString);
}

