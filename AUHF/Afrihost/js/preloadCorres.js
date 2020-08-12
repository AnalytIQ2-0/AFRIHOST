window.addEventListener("load",function(){
    var urlR = new XMLHttpRequest();
    var memberID = localStorage.getItem("Member_ID");
    var memberFname = localStorage.getItem("Member_Fname");
    var memberLname = localStorage.getItem("Member_Lname");
    var memberIdInt = parseInt(memberID);
    document.getElementById('memberID').value=memberIdInt;
    document.getElementById('fname').value=memberFname;
    document.getElementById('lname').value=memberLname

});
