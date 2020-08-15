window.addEventListener("load",function(){
    var urlR = new XMLHttpRequest();
    var memberID = sessionStorage.getItem("Member_ID");
    var memberFname = sessionStorage.getItem("Member_Fname");
    var memberLname = sessionStorage.getItem("Member_Lname");
    var memberIdInt = parseInt(memberID);
    document.getElementById('memberID').value=memberIdInt;
    document.getElementById('lname').value=memberLname+" "+memberFname;

});
