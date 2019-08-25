# laravel-slack-api
This library can be created and sent to slack bots with Laravel

## 最初に実行してください。
`php composer.phar install`
`php artisan key:generate`

### composerでslack-notification-channelの追加
`php composer.phar require laravel/slack-notification-channel`

### slackテスト
`curl -s http://localhost:10080/my -o /dev/null -w '%{http_code}\n'`
10080はご自身の設定しているポート番号へ適宜変更してください。
200が返ってくれば成功です。

### Facadeパターンを自分で作る場合
`php artisan make:notification SlackNotification`
`php artisan make:provider SlackServiceProvider`
`php artisan make:controller MyController`
これらを実行すればファイルが自動的に生成されます。
