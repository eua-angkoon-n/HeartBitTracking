<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Keep;

class BatchCreatePermissionsRequest extends \Google\Collection
{
  protected $collection_key = 'requests';
  /**
   * @var CreatePermissionRequest[]
   */
  public $requests;
  protected $requestsType = CreatePermissionRequest::class;
  protected $requestsDataType = 'array';

  /**
   * @param CreatePermissionRequest[]
   */
  public function setRequests($requests)
  {
    $this->requests = $requests;
  }
  /**
   * @return CreatePermissionRequest[]
   */
  public function getRequests()
  {
    return $this->requests;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchCreatePermissionsRequest::class, 'Google_Service_Keep_BatchCreatePermissionsRequest');
