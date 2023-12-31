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

namespace Google\Service\Compute;

class RegionInstanceGroupManagersListInstanceConfigsResp extends \Google\Collection
{
  protected $collection_key = 'items';
  /**
   * @var PerInstanceConfig[]
   */
  public $items;
  protected $itemsType = PerInstanceConfig::class;
  protected $itemsDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;
  /**
   * @var RegionInstanceGroupManagersListInstanceConfigsRespWarning
   */
  public $warning;
  protected $warningType = RegionInstanceGroupManagersListInstanceConfigsRespWarning::class;
  protected $warningDataType = '';

  /**
   * @param PerInstanceConfig[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return PerInstanceConfig[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param RegionInstanceGroupManagersListInstanceConfigsRespWarning
   */
  public function setWarning(RegionInstanceGroupManagersListInstanceConfigsRespWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return RegionInstanceGroupManagersListInstanceConfigsRespWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegionInstanceGroupManagersListInstanceConfigsResp::class, 'Google_Service_Compute_RegionInstanceGroupManagersListInstanceConfigsResp');
