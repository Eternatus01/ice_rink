# Ледовый каток

Сайт с бронированием коньков и оплатой через ЮKassa.

## Запуск

```bash
# 1. Установка зависимостей
composer install
npm install

# 2. Настройка окружения
cp .env.example .env
php artisan key:generate

# 3. База данных
php artisan migrate

# 4. (Опционально) Сборка фронтенда
npm run build

# 5. Запуск сервера
php artisan serve
```

Откройте http://localhost:8000

## Админ-панель

Адрес: `/admin` — доступна без авторизации.

## ЮKassa

Добавьте в `.env`:

```
YOOKASSA_SHOP_ID=ваш_shop_id
YOOKASSA_SECRET_KEY=ваш_секретный_ключ
APP_URL=http://localhost:8000
```

Для локальной разработки на Windows при ошибке SSL:

```
YOOKASSA_SSL_VERIFY=false
```
