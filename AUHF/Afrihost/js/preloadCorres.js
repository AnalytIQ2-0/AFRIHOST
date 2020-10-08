window.addEventListener("load",function(){
    var urlR = new XMLHttpRequest();
    var memberID = sessionStorage.getItem("Member_ID");
    var memberFname = sessionStorage.getItem("Member_Fname");
    var memberLname = sessionStorage.getItem("Member_Lname");
    var memberIdInt = parseInt(memberID);
    document.getElementById('memberID').value=memberIdInt;
    var name = "<h5> Member:<br> "+ memberFname +" "+memberLname+"</h5>";
    var heading = document.getElementById('lname').value;
    heading.insertAdjacentHTML('beforeend',name);
    //document.getElementById('lname').value=memberLname+" "+memberFname;
});
