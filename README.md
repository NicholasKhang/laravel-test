## laravel-test

-   Author: Nicholas Lee
-   Please feel free to visit my portfolio at [nicholaskhang.github.io](https://nicholaskhang.github.io/)

## Prerequisites

-   Composer
-   PHP > 7.2.5
-   NodeJs

## Installation

Clone or download this repository, move to the directory then run the following commands to install dependencies.

### Composer

```
$ composer install
```

### Npm

```
$ npm install
```

### Migration and seeder

Migration:

```
$ php artisan migrate
```

Seeder:

```
$ php artisan db:seed --class=ProductSeeder
```

### Serve

If you do not setup a web server, run the following command to serve this laravel app:

```
$ php artisan serve
```

## API Documentation

**Data format:** JSON

**Function**

-   [List](#list)
-   [Get](#get)
-   [Create](#create)
-   [Update](#update)
-   [Delete](#delete)

---

### List

List all products.

**HTTP Method:** GET

**Path** /api/products

**Url:**

> https://{endpoint}/api/products

#### Query Param

| Name | Type    | Description                         |
| ---- | ------- | ----------------------------------- |
| size | integer | _Optional_ Number of items per page |
| page | integer | _Optional_ Page number              |

**Example:**

> localhost:8000/api/products?size=2&page=3

#### Sample success response

```json
[
    {
        "id": 5,
        "code": "P005",
        "name": "Philips HR2051 / HR2056 / HR2059 Ice Crushing Blender Jar Mill",
        "category": "Small Kitchen Appliances",
        "brand": "Philips",
        "type": "Mixers & Blenders",
        "description": "Philips HR2051 Blender (350W, 1.25L Plastic Jar, 4 stars stainless steel blade)",
        "created_at": "2020-08-18T15:33:37.000000Z",
        "updated_at": "2020-08-18T15:33:37.000000Z"
    },
    {
        "id": 6,
        "code": "P006",
        "name": "Gemei GM-6005 Rechargeable Trimmer Hair Cutter Machine",
        "category": "Hair Styling Tools",
        "brand": "Gemei",
        "type": "Trimmer",
        "description": "The GEMEI hair clipper is intended for professional use.",
        "created_at": "2020-08-18T15:33:37.000000Z",
        "updated_at": "2020-08-18T15:33:37.000000Z"
    }
]
```

---

### Get

Retrieve product by product code.

**HTTP Method:** GET

**Path** /api/products/{code}

**Url:**

> https://{endpoint}/api/products/{code}

#### Path Param

| Name | Type   | Description             |
| ---- | ------ | ----------------------- |
| code | string | _Required_ Product code |

**Example:**

> localhost:8000/api/products/P002

#### Sample success response

```json
[
    {
        "id": 2,
        "code": "P002",
        "name": "Party Cosplay Player Unknown Battlegrounds Clothes Hallowmas PUBG",
        "category": "Men's Clothing",
        "brand": "No Brand",
        "type": null,
        "description": "Suitable for adults and children.",
        "created_at": "2020-08-18T15:33:37.000000Z",
        "updated_at": "2020-08-18T15:33:37.000000Z"
    }
]
```

---

### Create

Create product.

**HTTP Method:** POST

**Path** /api/products

**Url:**

> https://{endpoint}/api/products

**Example:**

> localhost:8000/api/products

#### Request Body

**Format:** JSON

| Name        | Type   | Description                    |
| ----------- | ------ | ------------------------------ |
| code        | string | _Required_ Product code        |
| name        | string | _Required_ Product name        |
| category    | string | _Required_ Product category    |
| brand       | string | _Optional_ Product brand       |
| type        | string | _Optional_ Product type        |
| description | string | _Optional_ Product description |

**Example:**

```json
{
    "code": "P016",
    "name": "Party Cosplay Player Unknown Battlegrounds Clothes Hallowmas PUBG",
    "category": "Men's Clothing",
    "brand": "No Brand",
    "type": "Cloth",
    "description": "Suitable for adults and children."
}
```

#### Sample success response

```json
[
	"message": "Product has been successfully created",
    "product": {
		"id": "16",
        "code": "P016",
        "name": "Party Cosplay Player Unknown Battlegrounds Clothes Hallowmas PUBG",
        "category": "Men's Clothing",
        "brand": "No Brand",
        "type": "Cloth",
        "description": "Suitable for adults and children.",
        "created_at": "2020-08-18T15:33:37.000000Z",
        "updated_at": "2020-08-18T15:33:37.000000Z"
    }
]
```

---

### Update

Update product by product code.

**HTTP Method:** PUT

**Path** /api/products/{code}

**Url:**

> https://{endpoint}/api/products

#### Path Param

| Name | Type   | Description                                      |
| ---- | ------ | ------------------------------------------------ |
| code | string | _Required_ Product code of product to be updated |

**Example:**

> localhost:8000/api/products/P002

#### Request Body

**Format:** JSON

| Name        | Type   | Description                    |
| ----------- | ------ | ------------------------------ |
| name        | string | _Optional_ Product name        |
| category    | string | _Optional_ Product category    |
| brand       | string | _Optional_ Product brand       |
| type        | string | _Optional_ Product type        |
| description | string | _Optional_ Product description |

**Example:**

```json
{
    "name": "Party Cosplay Player Unknown Battlegrounds Clothes Hallowmas PUBG",
    "category": "Men's Clothing1",
    "brand": "No Brand",
    "type": "Cloth",
    "description": "Suitable for adults and children."
}
```

#### Sample success response

```json
[
	"message": "Product has been successfully updated",
    "product": {
        "id": 2,
        "code": "P002",
        "name": "Party Cosplay Player Unknown Battlegrounds Clothes Hallowmas PUBG",
        "category": "Men's Clothing1",
        "brand": "No Brand",
        "type": null,
        "description": "Suitable for adults and children.",
        "created_at": "2020-08-18T15:33:37.000000Z",
        "updated_at": "2020-08-18T15:33:37.000000Z"
    }
]
```

---

### Delete

Delete product by product code.

**HTTP Method:** DELETE

**Path** /api/products/{code}

**Url:**

> https://{endpoint}/api/products

#### Path Param

| Name | Type   | Description                                      |
| ---- | ------ | ------------------------------------------------ |
| code | string | _Required_ Product code of product to be updated |

**Example:**

> localhost:8000/api/products/P002

#### Sample success response

```json
[
	"message": "Product has been successfully deleted",
    "product": {
        "id": 2,
        "code": "P002",
        "name": "Party Cosplay Player Unknown Battlegrounds Clothes Hallowmas PUBG",
        "category": "Men's Clothing1",
        "brand": "No Brand",
        "type": null,
        "description": "Suitable for adults and children.",
        "created_at": "2020-08-18T15:33:37.000000Z",
        "updated_at": "2020-08-18T15:33:37.000000Z"
    }
]
```
