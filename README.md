# Simple Wa Sender

Easy Setup Headless multi session Whatsapp Gateway with NodeJS

- Bulk Message
- AutoReply Message
- Single message sender

#### Based on
[wa-multi-session](https://github.com/mimamch/wa-multi-session)

Laravel 10

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

```
// .env laravel 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={yourdb}
DB_USERNAME={yourusername}
DB_PASSWORD={yourpassword}

// in folder server copy .env.example to .env
PORT=5001 // which port to running on your machine
KEY=mysupersecretkey # For Securing Some Data
DB_HOST=localhost
DB_USER=ryouruser
DB_PASSWORD=yourpassword
DB_DATABASE=yourdbname
```

## Install and Running

Clone the project

```bash
  clone this repo
```
Go to the project directory

```bash
  cd whatsapp-gateway
```
Composer update

```bash
  composer update 
```
```bash
  php artisan migrate --seed 
```
```bash
  php artisan serve
```

Install dependencies

```bash
  cd server
```
```bash
  npm install
```

Start the server

```bash
  npm run start
```

Open On Browser & add device

```bash
    http://localhost/whatsapp-gateway/public/login
```
