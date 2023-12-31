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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1ListOrganizationsResponse extends \Google\Collection
{
  protected $collection_key = 'organizations';
  /**
   * @var GoogleCloudApigeeV1OrganizationProjectMapping[]
   */
  public $organizations;
  protected $organizationsType = GoogleCloudApigeeV1OrganizationProjectMapping::class;
  protected $organizationsDataType = 'array';

  /**
   * @param GoogleCloudApigeeV1OrganizationProjectMapping[]
   */
  public function setOrganizations($organizations)
  {
    $this->organizations = $organizations;
  }
  /**
   * @return GoogleCloudApigeeV1OrganizationProjectMapping[]
   */
  public function getOrganizations()
  {
    return $this->organizations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ListOrganizationsResponse::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ListOrganizationsResponse');
