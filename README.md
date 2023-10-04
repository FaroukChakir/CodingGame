
# CodingGame PHP

This application serve to create a products and categories, also to add product to certain categories with a relationship 0..* as a product can have zero to many categories.
This requires frontend as to review the products and search through the categories for specific products, and data is manipulated using commands.


## Remarks !

Create a database and update the variables in your .env File:

DB_DATABASE

DB_USERNAME

DB_PASSWORD

Cors= {add it in your .env and give it your frontend server}

## Run Locally

Clone the project

```bash
  git clone https://github.com/FaroukChakir/CodingGame.git
```

Go to the project directory

```bash
  cd CodingGame/CodingGamePHP
```

Install dependencies

```bash
  composer intall
```

Start the server

```bash
  php artisan serve
```


## Manipulatig Data 

### Manipulate Products

#### Create :

```bash
  php artisan product:create "Name" "Description" Price "Image location"
```
#### Delete :

```bash
  php artisan product:delete Id
```
### Manipulate Category

#### Create :

```bash
  php artisan category:create "Name" {categoryId} (use id if you want to add a sub-category)
```
#### Delete :

```bash
  php artisan category:delete Id
```

### Manipulate Product-Category

#### Create :

```bash
  php artisan categoryproduct:create {productId} {cetegoryId}
```
#### Delete :

```bash
  php artisan categoryproduct:delete Id
```
