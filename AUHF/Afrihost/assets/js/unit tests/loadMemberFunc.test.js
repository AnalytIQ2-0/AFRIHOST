const {checkData} =require("./loadMemberFunc");

//Individuals
test("Should return a table of all existing individual members.", ()=>{
    var testData = '{"member_id":"200712","member_fname":"Lerato","member_lname":"Moratua","member_title":"Individual","member_joinDate":"2017/06/12","member_companyName":null,"member_companySize":null,"member_country":"South Africa","member_email":"leratoMow@yahoo.com","member_status":"Active","member_contactNo":"0184751214","member_city":"Rustenburg"}';
    const resultObject = JSON.parse(testData);
    var returnStr = checkData(resultObject);

    var resultString = '<tr class="tablerow"><td class="col1" onclick="parseMemberId()">' + "200712" +
    '</td><td class="col2">' + "Individual" +
    '</td><td class="col3">' + "Lerato" + " "+ "Moratua" +
    '</td><td class="col4">' + null +
    '</td><td class="col5">' + "South Africa" +
    '</td><td class="col6">' + "leratoMow@yahoo.com" +
    '</td><td class="col7">' + "Active" +
    '</td></tr>';
    expect(returnStr).toBe(resultString);
    
});

//Companies
test("Should return a table of all existing company members.", ()=>{
    var testData = '{"member_id":"32017","member_fname":"Mary","member_lname":"Mohau","member_title":"Company","member_joinDate":"2018/06/12","member_companyName":"Crystal Lake Inc.","member_companySize":30000,"member_country":"South Africa","member_email":"crystal.mary@yahoo.com","member_status":"Active","member_contactNo":"0184752214","member_city":"Pretoria"}';
    const resultObject = JSON.parse(testData);
    var returnStr = checkData(resultObject);

    var resultString = '<tr class="tablerow"><td class="col1" onclick="parseMemberId()">' + "32017" +
    '</td><td class="col2">' + "Company" +
    '</td><td class="col3">' + "Mary" + " "+ "Mohau" +
    '</td><td class="col4">' + "Crystal Lake Inc." +
    '</td><td class="col5">' + "South Africa" +
    '</td><td class="col6">' + "crystal.mary@yahoo.com" +
    '</td><td class="col7">' + "Active" +
    '</td></tr>';
    expect(returnStr).toBe(resultString);
    
});
