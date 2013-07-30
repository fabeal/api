#Fabeal API

* Version: 1.0
* [Website](https://fabeal.com/)

## Description

Fabeal.com - Real estates offers export system.
Fabeal is currently under development status (alfa).

We provide REST API which empower offer main features for real estate offers: add, remove, get, edit, search

## Ping

Ping request should return 'pong' message.

Calling `pong`

```
GET: https://fabeal.com/api/v1/ping
```

## Get property

Get property should return array with detailed information about selected offer.

```
GET: https://fabeal.com/api/v1/property/get/id?api_key=your_api_key
```