# PHP 8.2 のイメージを使用
FROM php:8.2-apache

# Composer をインストール
RUN apt-get update && apt-get install -y libzip-dev git unzip && \
    docker-php-ext-install zip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 作業ディレクトリを指定
WORKDIR /var/www/html

# プロジェクトのソースコードをコンテナにコピー
COPY . .

# Composer を使って依存パッケージをインストール
RUN composer install

# ポート 80 でリッスンする設定
EXPOSE 80

# Apache サーバーを起動
CMD ["apache2-foreground"]
