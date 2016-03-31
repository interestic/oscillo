# Oscillo

[![wercker status](https://app.wercker.com/status/f6cfb3615eb03e32358668d9f0297b4c/s/master "wercker status")](https://app.wercker.com/project/bykey/f6cfb3615eb03e32358668d9f0297b4c)

非言語コミュニケーションサービス


## セットアップ

**1. レポジトリをクローン**

```bash
$ git clone git@bitbucket.org:do9iigane/oscillo.git
```

**2. Composerパッケージのインストール**

```bash
$ composer install
```

**3. NPM/Bowerモジュールのインストール**

```bash
$ npm install -g gulp bower
$ npm install
$ bower install
```

**4. プロジェクトルートに`.env`ファイルを設置し、情報を編集する**

> [Example](https://github.com/laravel/laravel/blob/master/.env.example)

**5. アセットのビルド**

```
$ gulp
```

** 6. Done！ **
サーバを起動して確認する



## 開発時に使えるコマンド

**ビルトインサーバ起動**

```bash
$ ./start_serve.sh
```

**フロントまわりのファイルを監視する**

```bash
$ gulp watch
```
> その他のElixirにまつわるコマンドは[こちら](https://laravel.com/docs/5.2/elixir)を参照
