#Fabeal API

* Version: 1.0
* [Website](https://fabeal.com/)

## Description

Fabeal.com - Real estates offers export system.
Fabeal is currently under development status (alfa).


List of API methods
----------------
The API consists of the following methods:

+--------+----------------------------+----------------------------------------------------------+
| Method |  URL                       | Action                                                   |
+========+============================+==========================================================+
| GET    | api/v1/ping                | Checking API call                                        |
+--------+----------------------------+----------------------------------------------------------+
| GET    | api/v1/property/1          | Retrieves detailed property data by id                   |
+--------+----------------------------+----------------------------------------------------------+
| POST   | api/v1/property            | Adds new property                                        |
+--------+----------------------------+----------------------------------------------------------+
| PUT    | api/v1/property/1          | Updates property data by id                              |
+--------+----------------------------+----------------------------------------------------------+
| DELETE | api/v1/property/1          | Deletes (permanently) property by id                     |
+--------+----------------------------+----------------------------------------------------------+
| POST   | api/v1/properties/search   | Search properties by attached conditions                 |
+--------+----------------------------+----------------------------------------------------------+



Getting started
------------------------
To fast develop integration with Fabeal you can use following solutions:
* Your own solution in any language
* CURL library
.. code-block:: shell

     curl -i -X GET http://fabeal.v.l/api/v1/ping

* Use our library with extended examples written in PHP


## Ping

Ping request should return 'pong' message. Deviating from strict REST standards we respect ping method call by all http
methods [GET, POST, PUT, DELETE]

Calling `ping`

```
GET: https://fabeal.com/api/v1/ping
```
