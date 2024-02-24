<!DOCTYPE html>
<html lang="ja">
<body>
    <div>
        <p>{{$mail_text['user']['name']}}様</p>
        <p>この度はご予約いただき、ありがとうございました</p>
    </div>
    <div>
        <p>本日、{{$mail_text['datetime']}}にご来店お待ちしております。</p>
    </div>
    <div>
        <p>FROM {{$mail_text['shop']['name']}}</p>
    </div>
</body>
</html>