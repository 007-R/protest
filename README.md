#アプリケーション名
Rese
![image](https://github.com/007-R/mogi2_Q/assets/66697562/5cffcdf2-0378-47c7-b051-dda4f01f712c)

#目的
飲食店予約サービス

#アプリケーションURL
http://127.0.0.1

#機能一覧
会員登録
/ログイン
/ログアウト
/ユーザー情報取得
/ユーザー飲食店お気に入り一覧取得
/ユーザー飲食店予約情報取得
/飲食店一覧取得
/飲食店詳細取得
/飲食店お気に入り追加
/飲食店お気に入り削除
/飲食店予約情報追加
/飲食店予約情報削除
/エリアで検索する
/ジャンルで検索する
/店名で検索する
/予約変更機能
/評価機能
/バリデーション
/レスポンシブデザイン
/管理画面
/ストレージ
/認証
/メール送信
/リマインダー
/QRコード
/決済機能
/口コミ機能
/店舗一覧ソート機能
/CSVインポート機能

#使用技術
laravel8

#テーブル設計

![image](https://github.com/007-R/mogi2_Q/assets/66697562/86faf98d-1cf2-4ef2-9dff-c752cb078d82)

![image](https://github.com/007-R/mogi2_Q/assets/66697562/7b1cea60-af03-4f12-a3b4-1c3738500afc)

![image](https://github.com/007-R/mogi2_Q/assets/66697562/aea35c58-dd58-4d46-9b80-33daf6c9d97e)

![image](https://github.com/007-R/mogi2_Q/assets/66697562/c1c2d9f8-497f-475a-a70e-ef3f6020c352)




#ER図

![image](https://github.com/007-R/mogi2_Q/assets/66697562/09d83ea1-a529-4777-a0af-7515ccce925c)


#環境構築
1 docker環境構築（docker-compose up -d --build）
２　 ファイルインストール(composer update --ignore-platform-req=ext-gd (phpコンテナ内）)
3 .envファイル作成（touch .envにてファイル作成後、別途送付する内容を転記）
4 migration(docker-compose php artisan migrate(phpコンテナ内）) *無効の場合は、migrate:fresh
5 seeding(docker-compose php artisan db:seed(phpコンテナ内）)
6 storage (php artisan storage:link(phpコンテナ内）)



#その他(サンプルID(パスワード))

ユーザー：shaftsbury_works@yahoo.co.jp(password)

店鋪代表者：master1(password)

サイト管理者：admin(password)



#CSVインポート機能の使い方

csvファイルには以下４つのheaderに定められた項目を入力すること
[name]店舗名（50文字以内）

[area_id]1-3の数値を入力。各数値が示す項目は次の通り。

（1東京都, 2大阪府, 3福岡県
[genre_id]1-6の数値を入力。各数値が示す項目は次の通り。

1寿司, 2焼肉, 3イタリアン, 4居酒屋 5ラーメン

[description]店舗概要：400文字以内

上記条件を満たしたCSVファイルとともに画像(jpg or png)をアップロードすること。
