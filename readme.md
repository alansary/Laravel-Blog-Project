# Laravel Blog Project
## Windows Installation
  - [Xampp](https://www.apachefriends.org/download.html)
    - Apache + MariaDB + PHP + Perl
  - [Composer](https://getcomposer.org/doc/00-intro.md)
  - [Git & Git Bash](https://git-scm.com/downloads)
  - [Visual Studio Code](https://code.visualstudio.com/Download)
  - [VS Code Integrated Terminal](https://code.visualstudio.com/docs/editor/integrated-terminal)
    - Terminal Integration (Git Bash)
      1. Open VS Code
      2. File -> Preferences -> User Settings
      3. On the right hand side write the following then save and restart
        {
        "terminal.integrated.shell.windows": "C:\\Program Files\\Git\\bin\\bash.exe"
        }
  - Installing Laravel
    - cd ../../xampp/htdocs
    - composer create-project laravel/laravel projectName
    - cd projectName
  - Creating a Virtual Host
    - edit xampp/apache/conf/extra/vhost.conf add
      - <VirtualHost *:80>
        - DocumentRoot "C:/xampp/htdocs"
        - ServerName localhost
      - </VirtualHost>
      - <VirtualHost *:80>
        - DocumentRoot "C:/xampp/htdocs/lsapp/public"
        - ServerName lsapp.dev
      - </VirtualHost>
    - edit window/system32/drivers/etc/.host
      -127.0.0.1 localhost
      - 127.0.0.1 lsapp.dev
    - Restart Apache

## Debian Installation
  - Apache
    - sudo aptitude update
    - sudo aptitude safe-upgrade
    - sudo aptitude install apache2 apache2-doc
    - sudo ifconfig eth0
      - Output
        - inet addr:111.111.111.111
        - http://111.111.111.111
  - MySQL
    - sudo aptitude install mysql-server php5-mysql
    - sudo mysql_secure_installation
      - Interactive
        - Change the root password? [Y/n] n
      - Interactive
        - Remove anonymous users? [Y/n] y
    - mysql -u root -p
  - PHP
    - sudo aptitude install php5-common libapache2-mod-php5 php5-cli
    - sudo service apache2 restart
    - cd /var/www/html
    - sudo vi info.php
      - <?php phpinfo(); ?>
    - http://111.111.111.111/info.php
    - sudo rm -i /var/www/html/info.php
  - [XAMPP](https://www.apachefriends.org/download.html)
    - tar xvfz xampp-linux-[VERSION].tar.gz -C /opt
    - XAMPP is now installed below the /opt/lampp directory.
    - /opt/lampp/lampp start
    - http://localhost
  - Curl
    - apt-get install curl
  - Composer
    - curl -sS https://getcomposer.org/installer | php
    - mv composer.phar /usr/local/bin/composer
    - chmod +x /usr/local/bin/composer
    - cd /var/www/html
  - Git
    - apt-get install git
  - Laravel
    - Install laravel
      - git clone https://github.com/laravel/laravel.git
      - mv laravel projectName
      - cd projectName/
      - sudo composer install
      - chown -R www-data.www-data /var/www/html/projectName
      - chmod -R 755 /var/www/html/projectName
      - cp .env.example .env
      - chown -R www-data.www-data .env
      - chmod -R 777 /var/www/html/projectName/storage
    - Set Encryption Key
      - php artisan key:generate
      - gedit config/app.php
        - 'key' => env('APP_KEY', 'KEY'),
        - 'cipher' => 'CIPHER',
    - Create Apache VirtualHost
      - gedit /etc/apache2/sites-available/laravel.peojectName.com.conf
        - <VirtualHost *:80>
          - ServerName laravel.projectName.com
          - DocumentRoot "/var/www/http/projcetName/public"
        - </VirtualHost>
    - Enable website
      - a2ensite laravel.example.com
    - Reload Apache service
      - sudo service apache2 reload
    - Access Laravel
      - sudo echo "127.0.0.1  laravel.projectName.com" >> /etc/hosts
      - http://laravel.projectName.com

## Required Packages
  - VS Code Extensions
    - Ctrl + P
    - ext install laravel-blade
    - [Laravel Collective Forms & HTML](https://laravelcollective.com/docs/master/html)
    - composer require "laravelcollective/html":"^5.4.0"
    - Edit projectName/config/app.php
      - 'providers' => [
        - // ...
        - Collective\Html\HtmlServiceProvider::class,
        - // ...
      - ],
      - 'aliases' => [
        - // ...
        - 'Form' => Collective\Html\FormFacade::class,
        - 'Html' => Collective\Html\HtmlFacade::class,
        - // ...
      - ],
  - [laravel-ckeditor](https://github.com/UniSharp/laravel-ckeditor)
    - composer require unisharp/laravel-ckeditor
    - Edit projectName/config/app.php
      - 'providers' => [
        - // ...
        - Unisharp\Ckeditor\ServiceProvider::class,
        - // ...
      - ],
    - php artisan vendor:publish --tag=ckeditor
      - <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      - <script>
        - CKEDITOR.replace( 'article-ckeditor' );
      - </script>
  - Node Modules
    - npm install
## Screenshots
![1](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/1.png)
![2](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/2.png)
![3](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/3.png)
![4](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/4.png)
![5](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/5.png)
![6](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/6.png)
![7](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/7.png)
![8](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/8.png)
![9](https://github.com/alansary/Laravel-Blog-Project/blob/master/images/9.png)
