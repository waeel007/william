FROM dunglas/frankenphp

# Install the PHP extensions your project needs, e.g., pdo_mysql
RUN install-php-extensions pdo_mysql

COPY . /app
WORKDIR /app
