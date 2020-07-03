var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'bwmn4mt7ycbfdjnqk8sh-mysql.services.clever-cloud.com',
  user     : 'ufwrafrfszdv4rzl',
  password : 'TQpH0YIIQb8Cws1tjXie',
  database : 'bwmn4mt7ycbfdjnqk8sh'
});

connection.connect();

connection.query('SELECT 1 + 1 AS solution', function (error, results, fields) {
  if (error) throw error;
  console.log('The solution is: ', results[0].solution);
});

connection.end();
