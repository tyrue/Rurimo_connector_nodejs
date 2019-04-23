var express = require('express'); // pug 쓰기 위한 라이브러리
var db = require('./public/mysql');
var app = express();

app.locals.pretty = true; // 브라우저에서 코드 볼때 예쁘게 해줌
app.set('view engine', 'pug'); // 템플릿 엔진은 pug
app.set('views', './views') // 뷰 폴더에 있는 템플릿들을 가져온다
app.use(express.static('public')); // 정적 파일폴더


app.listen(3500, function () {
    console.log('Conneted 3500 port!');
});

var user_table = "userinfo";
app.get('/ranking', function (req, res) // home 페이지
{
    db.query(`select job, nickname, LEVEL, hp, mp from ${user_table} order by LEVEL desc`, function (error, result) {
        if (error) {
            throw error;
        }

        res.render('rank', {
            time: Date(),
            title: '흑바온 Ranking!',
            data: result
        }); // 템플릿을 가져와서 적용한다는 뜻
    });
});