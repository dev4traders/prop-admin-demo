# Dashboard Template for Prop Trading Company
This is the free example of Prop Trading Dashboard created based on <code>prop-admin</code>. You can use it as a starting point and then customize your own dashboard.

![Example of Prop Admin Use](/resources/user-dashoard-cropped.png "Prop Trading Dashboard Template")

# Quick Steps
    ```bash
    composer install
    composer update
    # rename `.env.example` to `.env`
    php artisan key:generate
    npm install --global yarn
    php artisan admin:minify default
    php artisan admin:publish
    # fill db from sql: database\sql\sneat-admin-demo.sql
    php artisan serve
    ```
# Database in SQL File
    use file database\sql\sneat-admin-demo.sql

# Test Credentials
    login: admin
    password: admin

# Other
Demo of <code>prop-admin</code> is based on the following plugins or services:
- [Laravel](https://laravel.com/)
- [Bootstrap5](https://getbootstrap.com/)
- [sneat-admin](https://themeselection.com/item/sneat-bootstrap-html-admin-template/)
- [dcat-admin](https://github.com/jqhph/dcat-admin)

# Demo: 
http://prop-admin-dash.dev4traders.com/

# License
<code>prop-admin</code> is licensed under [The MIT License (MIT)](https://github.com/dev4traders/prop-admin/blob/main/LICENSE).
