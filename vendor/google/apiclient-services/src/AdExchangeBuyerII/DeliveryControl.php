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

namespace Google\Service\AdExchangeBuyerII;

class DeliveryControl extends \Google\Collection
{
  protected $collection_key = 'frequencyCaps';
  /**
   * @var string
   */
  public $creativeBlockingLevel;
  /**
   * @var string
   */
  public $deliveryRateType;
  /**
   * @var FrequencyCap[]
   */
  public $frequencyCaps;
  protected $frequencyCapsType = FrequencyCap::class;
  protected $frequencyCapsDataType = 'array';

  /**
   * @param string
   */
  public function setCreativeBlockingLevel($creativeBlockingLevel)
  {
    $this->creativeBlockingLevel = $creativeBlockingLevel;
  }
  /**
   * @return string
   */
  public function getCreativeBlockingLevel()
  {
    return $this->creativeBlockingLevel;
  }
  /**
   * @param string
   */
  public function setDeliveryRateType($deliveryRateType)
  {
    $this->deliveryRateType = $deliveryRateType;
  }
  /**
   * @return string
   */
  public function getDeliveryRateType()
  {
    return $this->deliveryRateType;
  }
  /**
   * @param FrequencyCap[]
   */
  public function setFrequencyCaps($frequencyCaps)
  {
    $this->frequencyCaps = $frequencyCaps;
  }
  /**
   * @return FrequencyCap[]
   */
  public function getFrequencyCaps()
  {
    return $this->frequencyCaps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeliveryControl::class, 'Google_Service_AdExchangeBuyerII_DeliveryControl');
