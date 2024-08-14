# Laravel Notification System

## Overview

This project is a Laravel application that implements a complex notification system with real-time and asynchronous processing. Users can subscribe to various types of notifications, and notifications can be sent via email and broadcasted in real-time.

## Features

- Users can view and manage their notification subscriptions.
- Notifications are sent asynchronously via a queue system.
- Real-time notifications are broadcasted using Laravel Echo.
- Dockerized setup for easy deployment.

## Getting Started

### Prerequisites

- Docker
- Docker Compose
- Git

### Clone the Repository

First, clone the repository to your local machine:


git clone https://github.com/heinthurawynnn/notification-system.git
cd notification-system 

### Build and Run with Docker
#### Build and Start Docker Containers

Run the following command to build and start the Docker containers:
docker-compose up -d --build

#### Run Migrations

docker-compose exec app php artisan migrate

#### Seed Dummy Data
docker-compose exec app php artisan db:seed 
- for the testing your email account can customize in /notification-system/database/seeders/UsersTableSeeder.php


## Access the Application
Open your browser and navigate to http://localhost:8080.

You will see a page with dummy users. Here, you can:

Change Subscription Notification Types: Users can modify their notification subscriptions.
Test Sending Notifications: Click the "Send Test Notifications" button to send emails to all users.


## Testing
### Manage Notifications Type for each User
On the main page, you can update the notification types each user is subscribed to. This will help test different notification scenarios.
### Send Test Notifications
Click the "Send Test Notifications" button to trigger notifications for all users. This will send out emails and broadcast real-time notifications.

To stop and remove the containers, run docker command: docker-compose down


## Configuration

### Environment Variables
Update the .env file to configure email settings and other environment variables.

Example .env configuration for email:
```python

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME="your gmail address"
MAIL_PASSWORD="gmail app password xxxx xxxx" 
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your gmail address"
MAIL_FROM_NAME="${APP_NAME}"

BROADCAST_DRIVER=pusher
PUSHER_APP_ID=1849673
PUSHER_APP_KEY=8b6f49c5e4739449ac3f
PUSHER_APP_SECRET=f67349f7eafc657d2aab
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=us2
```

### Broadcasting
Configure broadcasting in config/broadcasting.php and set up Laravel Echo with Pusher or your preferred WebSocket provider.
