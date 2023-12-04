<?php

namespace App\Services;

use GuzzleHttp\Client;

abstract class BaseService
{
  // protected Client $http;
  public const API_ROOT_URL = 'https://api.onview.nl/api/';
  public const USER_NAME = 'dz0hnNkC1QsAlO5bv3qFUcoe5IYafijdC3Fcq5ScJOM=';
  public const PASSWORD = 'J1nk/ceX0FH7x6BLeMEYZFqqEm2C';
  public Client $http;

  public function __construct()
  {
    $this->http = new Client([
      'base_uri' => self::API_ROOT_URL,
      'auth' => [self::USER_NAME, self::PASSWORD],
      'debug' => true

    ]);
  }
}
