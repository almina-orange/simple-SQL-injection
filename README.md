# simple-SQL-injection
test for simple SQL injection

## Note
- シンプルなSQLインジェクションの実験用ログインフォーラム
- heroku app にデータベースを追加済み（PostgreSQL）
- 以下のようなデータベースを想定する

| id | name | age | password |
| --- | --- | --- | --- |
| 1 | 山田太郎 | 28 | yamada |
| 2 | 佐藤隆 | 36 | sato |
| 3 | 斎藤達弘 | 46 | saito |
| 4 | 桜井さつき | 22 | sakurai |

------

## Reference
- Heroku + PHP から Heroku Postgres に接続する - Qiita, [https://qiita.com/shin1x1/items/68732dcf02a93c0a0fbb](https://qiita.com/shin1x1/items/68732dcf02a93c0a0fbb)
- PDOを使ったPHPでのデータベース基本操作 - Qiita, [https://qiita.com/mitsuru793/items/45b2452284e321c7a5a9](https://qiita.com/mitsuru793/items/45b2452284e321c7a5a9)
- Heroku上のDBにPHPからアクセス - Taka-Coma's Blog, [http://taka-coma.hateblo.jp/entry/2017/08/03/021655](http://taka-coma.hateblo.jp/entry/2017/08/03/021655)