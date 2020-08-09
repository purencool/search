Purencool Search
=========================


#### Features

* PSR-4 autoload compliant structure
* Unit-Testing with PHPUnit
* Comprehensive Guides and tutorial
* Easy to use to any framework or even a plain php file


### Installation 
#### Dependencies
1. Composer
2. PHP  

`composer require purencool/search`

### How to use the library

After installation in the simplest way to use the is library the following:
`
$obj = new Purencool\Search\Search([array of my choice]);
$results= $obj->getSearchResults(['search_request' => 'string I am serchig for]);
`


### Development
#### Dependencies
1. Composer
2. PHP  
3. PHPUnit
4. Xdebug
5. Dephpugger

#### Installation
* Clone the directory `git clone https://github.com/purencool/search.git`
* Install the vendor directory `composer install`

#### Debugging
1. Install [xdebug](https://xdebug.org/docs/install) 
2. In the root directory of the library from the terminal run `./vendor/bin/dephpugger server` you should see a server start
3. In the index.php file uncomment `xdebug_break();` function
4. Open another terminal navigate to root directory of the library and run  `./vendor/bin/dephpugger  debug` it should start listening
5. Go to the browser [localhost:8888](http://localhost:8888) the page will load but won't resolve.
6. Go back to the terminal where you enter this command `./vendor/bin/dephpugger  debug` you should see `Connected to XDebug server!`
7. To navigate the debugger navigate to [dephpugger comands-after-run](https://github.com/tacnoman/dephpugger#comands-after-run)

                     


#### See working examples
`./vendor/bin/dephpugger server` or `php -S localhost:8000` then navigate to the browser.

#### Unit tests
`./vendor/bin/phpunit` runs all PHPUnit tests
`./vendor/bin/phpunit --filter <methodNameInClass>` run one set of tests



#### Troubleshooting
If the tests are not working run the command below.   
`composer dump-autoload` 



#### Contributors
Thanks to [sielver](https://github.com/sielver) for fixing the Namespaces issue