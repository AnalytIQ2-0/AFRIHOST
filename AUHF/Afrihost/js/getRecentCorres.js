var displayRecent = document.getElementById('displayRCorres');
function displayRecents(data){
  var htmlString="",hold="";
  hold=data[0].corres_image;
  if(!hold.localeCompare("false")){
    htmlString="No Correspondences available";
  }else{
    for(i =0; i <data.length;i++){

      htmlString+= '<div><img src="data:image/jpeg:base64,'+data[i].corres_image+
      '"/><span class="time-left">'+data[i].corres_date+'</span></div>';
    }
  }
  displayRecent.insertAdjacentHTML('beforeend',htmlString);
}
var memberID = localStorage.getItem("Member_ID");
var recent = new XMLHttpRequest();
recent.open('GET','http://localhost/github/AUHF/Afrihost/PHPs/getCorres.php?member_ID='+memberID);
recent.onload = function(){

  var jsonRecent = JSON.parse(recent.responseText);
  displayRecents(jsonRecent);
};
recent.send();
