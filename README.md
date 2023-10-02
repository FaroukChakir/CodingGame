# CodingGame
Commands : 
product:create {name} {description} {price} {image} /
category:create {name} {parent_id?} /
category_product:create {Product_id} {Category_id} /

category_product:delete {category_product_id} / 
category:delete {category_id} /
product:delete {product_id} /

# tester-frontend-codinggame

## Project setup
```
composer install
```

### Compiles and run
```
php artisan serve
```
### Environment

## Environnement file should have a variable called "Trusted_Frontend" that will have the trusted frontend address ex :

Trusted_Frontend = http://localhost:8080/ (Vue.Js localhost)

### Product Category Commands :

## Create User

![image](https://github.com/FaroukChakir/CodingGame/assets/56736005/eb89445a-51c1-404e-9d8b-800682c4c407)

## Create Category with No Parent Category

![image](https://github.com/FaroukChakir/CodingGame/assets/56736005/8cd32322-fb0d-4330-8d4c-c11e90ed4fda)

## Create Category with Parent Category

![image](https://github.com/FaroukChakir/CodingGame/assets/56736005/c8e24f7b-52f1-4906-98f3-10b5a11fd69e)

## Add a product to category ( first Id is the product's and the seconde is the category's)

![image](https://github.com/FaroukChakir/CodingGame/assets/56736005/1372fd8e-564e-4bfc-8d2b-161402e4bca1)

## Delete a product

![image](https://github.com/FaroukChakir/CodingGame/assets/56736005/7403883f-f7f2-4b13-8b4c-13a09a861082)

## Delete a category

![image](https://github.com/FaroukChakir/CodingGame/assets/56736005/f403dbe4-faf8-4fc8-9d23-9deb4d7ccc3e)

## Delete product from a category 

![image](https://github.com/FaroukChakir/CodingGame/assets/56736005/6587cbb7-3343-4c8f-82b7-cc6ed4d7f9a4)



