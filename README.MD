# Post Manage System - Template
## Overview
![](https://i.imgur.com/RF1DHuj.png)

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
2. 至 **localhost:8000**看，是否有畫面
3. 若port8000已被占用，可下此指令更改port
```shell
$ php artisan serve --port=xxxx
```
4. 於右上角登入至後台，顯示如上例圖代表成功

## Password for login
```
e-mail: admin@123.com
password: admin2018
```

## Feature
1. 使用 Auth 登入
2. 後台首頁 : 管理所有公告(顯示、新增、修改、編輯、刪除)
3. 新增頁面 : 新增新的公告
4. 搜尋頁面 : 可依照條件搜尋公告(主旨、日期、分類)
5. 顯示頁面 : 顯示特定公告
6. 編輯頁面 : 編輯特定公告
7. 使用Session提醒目前操作

## Field for Announcement
- 目前已設定之欄位
    - title
    - category
    - reach
    - content
    - reference

## Default Category
1. 使用seed建立category
2. 可於 `/database/seeds/CatagoryTableSeeder` 修改


