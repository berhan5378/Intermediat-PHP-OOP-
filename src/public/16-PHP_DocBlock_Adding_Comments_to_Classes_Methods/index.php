<?php
/*
PHP DocBlock - Adding Comments to Classes & Methods
DocBlocks (Documentation Blocks) are a standardized way to add comments to PHP code, specifically for classes, methods, properties, and functions. 
They provide metadata and descriptions that can be used by IDEs, documentation generators (like PHPDocumentor), and developers to understand the purpose and usage of the code.

DocBlocks can specify parameter types, return types, and property types, improving code clarity and reducing errors.
A DocBlock is a multi-line comment that starts with '/**' and ends with '*/ // Each line in between typically starts with an asterisk (*).

//Install PHPDocumentor: composer require --dev phpdocumentor/phpdocumentor
//Run PHPDocumentor:vendor/bin/phpdoc
/*
DocBlocks support special tags (annotations) to provide structured information. 
Common tags include:
      @param	Describes a function/method parameter.
      @return	Describes the return value of a function/method.
      @throws	Indicates exceptions that a function/method might throw.
      @var	Describes the type of a class property.
      @deprecated	Marks a function/method as deprecated.
      @since	Indicates the version when a feature was introduced.
      @see	References related classes, methods, or external resources.
      @example	Provides an example of how to use the function/method.
      @author	Specifies the author of the code.
      @license	Indicates the license under which the code is distributed.




      DocBlocks are a powerful tool for documenting PHP code. They improve code readability, enable IDE support, and facilitate the generation of API documentation.
*/

/**
 * Represents a product in the inventory.
 *
 * This class handles product-related operations such as adding and removing items.
 *
 * @category   Model
 * @package    App\Models
 * @author     Jane Doe <jane.doe@example.com>
 * @license    MIT
 * @version    1.0
 * @since      2023-01-01
 */
class Product {
    /**
     * The name of the product.
     *
     * @var string
     */
    private $name;

    /**
     * The price of the product.
     *
     * @var float
     */
    private $price;

    /**
     * Creates a new product instance.
     *
     * @param string $name The name of the product.
     * @param float $price The price of the product.
     */
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Gets the name of the product.
     *
     * @return string The product name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Gets the price of the product.
     *
     * @return float The product price.
     */
    public function getPrice() {
        return $this->price;
    }
}