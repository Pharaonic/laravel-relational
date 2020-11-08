<p align="center"><a href="https://pharaonic.io" target="_blank"><img src="https://raw.githubusercontent.com/Pharaonic/logos/main/relational.jpg" width="470"></a></p>

<p align="center">
<a href="https://github.com/Pharaonic/laravel-relational" target="_blank"><img src="http://img.shields.io/badge/source-pharaonic/laravel--relational-blue.svg?style=flat-square" alt="Source"></a> <a href="https://packagist.org/packages/pharaonic/laravel-relational" target="_blank"><img src="https://img.shields.io/packagist/v/pharaonic/laravel-relational?style=flat-square" alt="Packagist Version"></a><br>
<a href="https://laravel.com" target="_blank"><img src="https://img.shields.io/badge/Laravel->=6.0-red.svg?style=flat-square" alt="Laravel"></a> <img src="https://img.shields.io/packagist/dt/pharaonic/laravel-relational?style=flat-square" alt="Packagist Downloads"> <img src="http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square" alt="Source">
</p>


##### Laravel - Simple relationships (Parents/Children) for model.

-----

###### Example:

```php
$category = Category::find(1);
$post = Post::find(1);
  
// Create/Update Child
$category->attach($post)

// Retrieve Category's Posts
$children = $category->children;

foreach($children as $record){
    dump($record->child->record);
}
```



## Install

Install the latest version using [Composer](https://getcomposer.org/):

```bash
$ composer require pharaonic/laravel-relational
```

then publish the migration & migrate 
```bash
$ php artisan vendor:publish --tag=laravel-relational
$ php artisan migrate
```




## Usage
```php
// An Example : (Post Model)
// Using hasRelationships in Post Model
...
use Pharaonic\Laravel\Relational\hasRelationships;

class Post extends Model
{
    use hasRelationships;
...
```



- [Parent Actions](#parents)
  - [Attach To Parent](#p_a)
  - [Detach From Parent](#p_d)
  - [Retrieve Object Parents](#p_r)

  
  
- [Child Actions](#children)
  - [Attach Child](#c_a)
  - [Detach Child](#c_d)
  - [Retrieve Object Children](#c_r)



<a name="parents" id="parents"></a>
## Parents




<a name="p_a" id="p_a"></a>

#### Attach To Parent

```php
// Object
$post->attachTo($category);

// List of Objects
$post->attachTo($category1, $category2);
// OR
$post->attachTo([$category1, $category2]);
```



<a name="p_d" id="p_d"></a>

#### Detach From Parent

```php
// Object
$post->detachFrom($category);

// List of Objects
$post->detachFrom($category1, $category2);
// OR
$post->detachFrom([$category1, $category2]);
```




<a name="p_r" id="p_r"></a>

#### Retrieve Object Parents

```php
// Single
$parent = $post->parent;

// Multi
$parents = $post->parents;
```









<a name="children" id="children"></a>
## Children



<a name="c_a" id="c_a"></a>

#### Attach Child

```php
// Object
$category->attach($post);

// List of Objects
$category->attach($post1, $post2);
// OR
$category->attach([$post1, $post2]);
```



<a name="c_d" id="c_d"></a>

#### Detach Child

```php
// Object
$category->detach($post);

// List of Objects
$category->detach($post1, $post2);
// OR
$category->detach([$post1, $post2]);
```




<a name="c_r" id="c_r"></a>

#### Retrieve Object Children

```php
// Single
$child = $category->child;

// Multi
$children = $category->children;
```




## License

[MIT license](LICENSE.md)
