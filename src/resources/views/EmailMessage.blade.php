<!DOCTYPE html>
<html lang="ja">
<body>
    <div>
        <p>{{ $mail_text->customer }} 様</p>
        <p>この度はご予約いただき、ありがとうございました</p>
    </div>
    <div>
        <p>{{ $mail_text->mail_text }}</p>
    </div>
    <div>
        <p>{{ $mail_text->sender }} より</p>
    </div>
</body>
</html>