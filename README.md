#Fabeal API

* Version: 1.0
* [Website](https://fabeal.com/)

## Description

Fabeal.com - Real estates offers export system.
Fabeal is currently under development status (alfa).


List of API methods
----------------
The API consists of the following methods:

<table>
	<tr>
		<td>Method</td>
		<td>URL</td>
		<td>Action</td>
	</tr>
	<tr>
		<td>GET</td>
		<td>api/v1/ping</td>
		<td>Checking API call</td>
	</tr>
	<tr>
		<td>GET</td>
		<td>api/v1/property/[[id]]</td>
		<td>Retrieves detailed property data by id</td>
	</tr>
	<tr>
		<td>POST</td>
		<td>api/v1/property</td>
		<td>Adds new property</td>
	</tr>
	<tr>
		<td>PUT</td>
		<td>api/v1/property/[[id]]</td>
		<td>Updates property data by id</td>
	</tr>
	<tr>
		<td>DELETE</td>
		<td>api/v1/property/[[id]]</td>
		<td>Deletes (permanently) property by id</td>
	</tr>
	<tr>
		<td>POST</td>
		<td>api/v1/properties/search</td>
		<td>Search properties by attached conditions</td>
	</tr>
</table>



Getting started
------------------------
To fast develop integration with Fabeal you can use following solutions:

* Your own solution in any language
* CURL library
```
curl -i -X GET https://fabeal.com/api/v1/ping
```
* Our library with extended examples written in PHP


Verification
------------------------
Every call to our api except ping will check you by API key. Every business in Fabeal has its own api key. Api key can
be included to url:
```
https://fabeal.com/api/v1/property/add?api_key=[[key]]
```
or can be included to POST/PUT/DELETE data providing that is not nested.


Watermarks
------------------------
If you have selected option to default draw watermarks on images all photos added/updated by api will have watermark.
Calling fabeal api you can add option 'draw_watermark' = false|true.
Watermark variable can be included to url:
```
https://fabeal.com/api/v1/property/add?api_key=[[key]]&draw_watermark=[[bool]]
```
or can be included to POST/PUT/DELETE data providing that is not nested.


## Ping

Ping request should return 'pong' message. Deviating from strict REST standards we respect ping method call by all http
methods [GET, POST, PUT, DELETE]

Calling `ping`

```
GET: https://fabeal.com/api/v1/ping
```
