var mysql = require('mysql'); // mysql 모듈 사용

// mysql에 접속, mysql 서버가 깔려있어야 함
var db = mysql.createConnection(
    {
        host : 'gamedata.cadmqqrnily5.ap-northeast-2.rds.amazonaws.com',
        user : 'root',
        password : 'abs753951',
        database : 'supremeplay'
    }
);

db.connect();
module.exports = db;