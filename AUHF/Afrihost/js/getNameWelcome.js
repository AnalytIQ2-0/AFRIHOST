var heading = document.getElementById('pageTitle');
var memberName = sessionStorage.getItem('member_fname');
var titleStr = "<div class ='p-tip' style='font-size: 25px; margin-top: 25px; text-align:center;'> Welcome "+ memberName+ "!</div>";

heading.insertAdjacentHTML('beforeend',titleStr);