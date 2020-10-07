var displayRecent = document.getElementById('displayRCorres');
window.addEventListener("load",function(){
//var memberID = sessionStorage.getItem("Member_ID");
var corresID = sessionStorage.getItem("conID");
var recent = new XMLHttpRequest();
recent.open('GET','http://localhost/AUHF/Afrihost/PHPs/getCorres.php?corres_ID='+corresID);
recent.onload = function(){
displayRecent.insertAdjacentHTML('beforeend',recent.responseText);
};
recent.send();
});
