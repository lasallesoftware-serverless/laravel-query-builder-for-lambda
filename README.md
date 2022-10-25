# LaSalle Software Serverless' Use Laravel Framework's Query Builder in Lambda Package

Use the Laravel Framework's Query Builder in AWS Lambda without mounting a Laravel Framework based Application.

To enjoy the convenience of Laravel's query builder in a PHP Lambda function.

## With Deepest Appreciation

- Excellent video and files: [https://www.youtube.com/watch?v=_mDDERFHSLw](https://www.youtube.com/watch?v=_mDDERFHSLw)
- Good approach to study: [https://github.com/jwh315/laravel-capsule-wrapper/](https://github.com/jwh315/laravel-capsule-wrapper/)
- Laravel putting together [Capsule](https://github.com/laravel/framework/blob/9.x/src/Illuminate/Database/Capsule/Manager.php)

## NOTES
- for MySQL only
- Query Builder only (not Eloquent)
- no Eloquent
- no Laravel Framework database event handling

** THIS PACKAGE ONLY ACCESSES A DATABASE ON LOCALHOST. REMOTE DB ACCESS IS ON DECK. **

## Installation

```BASH
composer require lasallesoftware-serverless/laravel-query-builder-for-lambda
```

## Usage

```PHP
<?php
error_reporting(E_ALL);

require_once(__DIR__ . '/vendor/autoload.php');

use Lasallesoftwareserverless\Laravelquerybuilderlambda\DatabaseConnection;
use Illuminate\Database\Capsule\Manager as DB;


new DatabaseConnection;

$users = DB::table('users')->get();


foreach ($users as $user) 
{ 
    echo "<br />name = " . $user->name;
}
```

## Security

If you discover any security related issues, please email Bob Bloom at "bob dot bloom at lasallesoftware dot ca" instead of using the issue tracker.

## License

LaSalle Software is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

As reference, there is a wonderful blog post called [The MIT License, Line by Line -- 171 words every programmer should understand](https://writing.kemitchell.com/2016/09/21/MIT-License-Line-by-Line.html).

Please note:
>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

## You Are Responsible For Your Amazon Web Services Charges

The code in this software repository is specifically intended to be used in AWS Lambda functions. Lambda is a pay-per-use AWS service. That means that this code may, or will, trigger AWS charges for you.

Your AWS charges from using code in this repository are your responsibility. 

## Caveats

Software and information in this repo:
- may be out of date
- may contain errors and/or omissions
- may change without notice
- is not designed to run as fast as possible within Lambda
- is not designed to cause the least AWS charges
- does not optimize AWS settings to cause the least AWS charges
- does not optimize AWS security


## Links

- [Change Log](CHANGELOG.md)