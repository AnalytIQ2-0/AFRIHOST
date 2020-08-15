var displayRecent = document.getElementById('displayRCorres');
window.addEventListener("load",function(){
var memberID = sessionStorage.getItem("Member_ID");
var recent = new XMLHttpRequest();
recent.open('GET','http://localhost/github/AUHF/Afrihost/PHPs/getCorres.php?member_ID='+memberID);
recent.onload = function(){
displayRecent.insertAdjacentHTML('beforeend',recent.responseText);
};
recent.send();
});
