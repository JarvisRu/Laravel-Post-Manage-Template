# Post Manage System - Template

## Build locally
##### 1. 將專案 clone/pull 至 local
- `$ git clone git@github.com:JarvisRu/Laravel-Post-Manage-Template.git`
- 於此資料夾下 安裝 composer 
    ```shell
    $ cd [project-dir]
    $ composer install
    ```
##### 2. 更改 .env相關資料(設定環境)
- `$ cp .env.example .env` : 建立.env file
- `$ php artisan key:generate` : 產生secret key
-  自行新增資料庫於local後
-  更改資料庫資料 : DB_DATABASE , DB_USERNAME , DB_PASSWORD
    ```
    DB_DATABASE=ur_database_name
    DB_USERNAME=root
    DB_PASSWORD=
    ```
##### 3. 匯入 database & seed 至本機資料庫
```shell
$ php artisan migrate --seed
```

##### 4. 測試是否建置成功
1. 開serve
```shell
$ php artisan serve
```
2. 至 **localhost:8000**看 是否有畫面
3. 若port8000已被占用 可下此指令更改port
```shell
$ php artisan serve --port=xxxx
```

## Password for login
```
e-mail: admin@123.com
password: admin2018
```

## Feature


## Field for Announcement



