<?php

/**
 * Lasalle Software's Serverless package to use Laravel Framework's query builder
 * without launching an entire Laravel Application. For specific use in AWS Lambda.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright  (c) 2022 The South LaSalle Trading Corporation
 * @license    http://opensource.org/licenses/MIT
 * @author     Bob Bloom
 * @email      bob.bloom@lasallesoftware.ca
 * @link       https://lasallesoftware.ca
 * @link       https://phpserverlessproject.com
 * @link       https://packagist.org/packages/lasallesoftwareserverless/laravel-query-builder-for-lambda
 * @link       https://github.com/lasallesoftware-serverless/laravel-query-builder-for-lambda
 *
 */

namespace Lasallesoftwareserverless\Laravelquerybuilderlambda;

use Illuminate\Database\Capsule\Manager as Capsule;
use Dotenv\Dotenv;

class DatabaseConnection
{
  public function __construct()
  {
    $this->loadDotenv();
    $this->addConnection();
  }

  /**
   * Establish the database connection
   *
   * @return void
   */
  public function addConnection() : void
  {
    $capsule = new Capsule;

    //  Register a connection with the manager
    $capsule->addConnection([
      'driver'    => $_ENV['DB_CONNECTION'],
      'host'      => $_ENV['DB_HOST'],
      'database'  => $_ENV['DB_DATABASE'],
      'username'  => $_ENV['DB_USERNAME'],
      'password'  => $_ENV['DB_PASSWORD'],
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
      'socket'    => $_ENV['DB_SOCKET'],
    ]);

    // Make this Capsule instance available globally via static methods
    // https://github.com/laravel/framework/blob/9.x/src/Illuminate/Support/Traits/CapsuleManagerTrait.php
    $capsule->setAsGlobal();
  }

  /**
   * Load Dotenv
   *
   * @return void
   */
  public function loadDotenv() : void
  {
    $dotEnv = Dotenv::createMutable(realpath(__DIR__.'/.././../../../'));
    $dotEnv->load();
  }
}