#setup

##1. laravelの準備  
```
$ composer update
```  
##2. elixr の準備  
gulpがなければgulpのinstall  
```
npm install --global gulp
```  
elixrのinstall  
```
npm install
```  
[laraveldoc]: https://laravel.com/docs/5.2/elixir#installation  "参考"

----
#tips

- dbへのログイン情報等はdocrootの .envに追加すると良い
- gulp コマンドで staticファイルをbuildしてくれる $ gulp watch 便利
- php =< 5.4 ならbuiltin server が使えるから docroot の start_serve.sh を叩くと http://127.0.0.1:9999 で確認出来る