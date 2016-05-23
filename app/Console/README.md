# batch
batchの説明


```bash
$ php artisan batch:owm -h
Usage:
  batch:owm <mode> [<locale>]

Arguments:
  mode                  import-city, delete-city, weather-insert
  locale                jp | all [default: "jp"]
```

- import-city   
都市listをimportします。 第二引数に locale(jp|all)を指定できます。default:jp 読み込み先は storage/master/city.list.{jp}.json
- delete-city   
都市listをtruncateします。
- weather-insert   
scheduleで実行させる為です。 import-cityでinsertしたrecordをlistとし、[open weather map API]に問い合わせた結果を [daily_weathers]tableにinsertします。