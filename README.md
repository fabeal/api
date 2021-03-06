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

Values
------------------------
We accept only data in JSON.
We always return data in JSON.

Verification
------------------------
Every call to our api except ping will check you by API key. Every business in Fabeal has its own api key which is private.
Api key can be included to url:
```
https://fabeal.com/api/v1/property/add?api_key=[[key]]
```
or can be included to POST/PUT/DELETE data providing that is not nested.


Watermarks
------------------------
If you have selected option to default draw watermarks on images all photos added/updated by api will have watermark,
draw_watermark set to false temporary overwrite default settings.
Calling fabeal api you can add option 'draw_watermark' = false|true.
Watermark variable can be included to url:
```
https://fabeal.com/api/v1/property/add?api_key=[[key]]&draw_watermark=[[bool]]
```
or can be included to POST/PUT/DELETE data providing that is not nested.

Photos extensions
------------------------
Our api during API request with photos will download photos from external services by your links. We accept only the following file extensions:
* jpg
* jpeg
* bmp
* png


## Ping

Ping request should return 'pong' message. Deviating from strict REST standards we respect ping method call by all http
methods [GET, POST, PUT, DELETE]

Calling `ping`

```
GET: https://fabeal.com/api/v1/ping
```

## Add

Add property with all details and photos.

Calling `Add`
```
POST: https://fabeal.com/api/v1/property
```
```json
{
	"price"                 :"250000",
	"title"                 :"Lorem ipsum",
	"description"           :"Lorem ipsum",
	"area"                  :"80",
	"rooms"                 :"3",
	"offer_type"            :"sale",
	"floor"                 :"3",
	"built"                 :"1999",
	"balconies"             :"1",
	"windows"               :"Lorem ipsum",
	"city"                  :"Warszawa",
	"draft"                 :"1",
	"garage"                :"",
	"basement"              :"1",
	"parking_place"         :"1",
	"secure_parking"        :"",
	"volume"                :"0",
	"underground_parking"   :"",
	"photos":{
			"photo_name_1":"http:\/\/domain.com\/photo_name_1.jpg",
			"photo_name_2":"http:\/\/domain.com\/photo_name_2.bmp",
			"photo_name_3":"http:\/\/domain.com\/photo_name_3.jpeg"
			}
}
```

Return values

```
HTTP/1.1 200 Created
Content-Length: 16
Content-Type: application/json
```
```json
"Property added"
```
We accept max 30 photos, if there will be more than 30 - no photos will be added.


## Delete

Permanently delete property with all files belonging.

Calling `delete`

```
DELETE: https://fabeal.com/api/v1/property/[[id]]
```

Return values

```
HTTP/1.1 200 Created
Content-Length: 18
Content-Type: application/json
```
```json
"Property removed"
```


## Update

Update request will change only this fields which were in JSON array.

Calling `update`

```
PUT: https://fabeal.com/api/v1/property/[[id]]
```
```json
{
	"price"        :"2500001",
	"title"        :"New data",
	"description"  :"New data",
	"windows"      :"Broken",
	"area"         :"80",
	"rooms"        :"3",
	"offer_type"   :"sale",
	"floor"        :"3",
	"built"        :"1999",
	"balconies"    :"1",
	"windows"      :"Lorem ipsum",
	"city"         :"Warszawa",
	"draft"        :"1",
	"photos":{
	        "photo_name_1":"http:\/\/domain.com\/photo_name_1.jpg",
	        "photo_name_2":"http:\/\/domain.com\/photo_name_2.bmp",
	        "photo_name_3":"http:\/\/domain.com\/photo_name_3.jpeg"
	        }
}
```
Response

```
HTTP/1.1 200 Created
Content-Length: 17
Content-Type: application/json
```
```json
"Property updated"
```

## Search

Search properties is very useful method which return founded properties IDs. Possible logical operators:
* =
* >
* <
* !=
* >=
* <=

all scopes can be combined - this work like (SQL)where conditions.

Calling `Search`
```
POST: https://fabeal.com/api/v1/properties/search
```
```json
{
	"price":[
				"250000",">="
			],
	"rooms":[
				"3","="
			]
}
```

Return values
```
HTTP/1.1 200 Created
Content-Length: 52
Content-Type: application/json
```
```json
[
	"1563568","89489156","519489","989887","625899"
]
```


Todo
------------------------
We are currently working on API upgrade with following features:
* Search method should have 'between' scope
* Get multiple offers with one request
* Set multiple offers with one request