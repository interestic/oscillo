# oscillo
dev:[![Build Status](https://travis-ci.org/interestic/oscillo.svg?branch=dev)](https://travis-ci.org/interestic/oscillo)
stg:[![Build Status](https://travis-ci.org/interestic/oscillo.svg?branch=stg)](https://travis-ci.org/interestic/oscillo)
prd:[![Build Status](https://travis-ci.org/interestic/oscillo.svg?branch=prd)](https://travis-ci.org/interestic/oscillo) 


非言語コミュニケーションサービス

## セットアップ

### ソースの準備
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

**6. Done！**  
サーバを起動して確認する

### homestealの準備

**1. submodule を配置**  
```
$ git submodule init
$ git submodule update
```

**2. vagrant.yamlの準備**
```
$ homesteal/gardening gardening:setup
```

**3. vagrant up!**
```
$ vagrant up 
```
2016/04/18
現行のgardening box はkernel versionが古いようで、
以下のようにmountに失敗する。

```
Failed to mount folders in Linux guest. This is usually because
the "vboxsf" file system is not available. Please verify that
the guest additions are properly installed in the guest and
can work properly. The command attempted was:

mount -t vboxsf -o uid=`id -u vagrant`,gid=`getent group vagrant | cut -d: -f3` vagrant /vagrant
mount -t vboxsf -o uid=`id -u vagrant`,gid=`id -g vagrant` vagrant /vagrant

The error output from the last command was:

/sbin/mount.vboxsf: mounting failed with the error: No such device

```

以下で暫定対応

```
$ vagrant ssh
$ sudo yum -y update kernel
$ sudo yum -y install kernel-devel kernel-headers dkms gcc gcc-c++
$ vagrant reload
```

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
