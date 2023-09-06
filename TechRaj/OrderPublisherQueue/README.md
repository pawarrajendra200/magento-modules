# Overview
## Purpose of module

TechRaj\OrderPublisherQueue module is responsible for create a order publisher queue in system,
TechRaj\OrderPublisherQueue module is work with RabbitMQ
# Deployment
## System requirements

#### We have to install latest version of RabbitMQ if not installed yet.
 1) RabbitMQ installation command : sudo apt install -y rabbitmq-server
 2) Set RabbitMQ configuration values in magento  command: bin/magento setup:config:set --amqp-host="localhost" --amqp-port="15672" --amqp-user="guest" --amqp-password="guest" --amqp-virtualhost="/"
 3) Verify RabbitMQ with http://localhost:15672/


## Install
### Add repository
Repositry : composer config repositories.rajtech git git@github.com:pawarrajendra200/magento-modules.git
### Install the Extension using Composer
composer require tech-raj/order-publisher-queue
### Enable the Extension

php bin/magento module:enable tech-raj/order-publisher-queue

### Last execute magento commanads
1) php bin/magento setup:upgrade
2) php bin/magento setup:di:compile
3) php bin/magento setup:static-content:deploy
4) php bin/magento setup:cache:flush
