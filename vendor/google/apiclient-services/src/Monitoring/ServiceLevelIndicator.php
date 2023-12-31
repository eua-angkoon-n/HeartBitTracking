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

namespace Google\Service\Monitoring;

class ServiceLevelIndicator extends \Google\Model
{
  /**
   * @var BasicSli
   */
  public $basicSli;
  protected $basicSliType = BasicSli::class;
  protected $basicSliDataType = '';
  /**
   * @var RequestBasedSli
   */
  public $requestBased;
  protected $requestBasedType = RequestBasedSli::class;
  protected $requestBasedDataType = '';
  /**
   * @var WindowsBasedSli
   */
  public $windowsBased;
  protected $windowsBasedType = WindowsBasedSli::class;
  protected $windowsBasedDataType = '';

  /**
   * @param BasicSli
   */
  public function setBasicSli(BasicSli $basicSli)
  {
    $this->basicSli = $basicSli;
  }
  /**
   * @return BasicSli
   */
  public function getBasicSli()
  {
    return $this->basicSli;
  }
  /**
   * @param RequestBasedSli
   */
  public function setRequestBased(RequestBasedSli $requestBased)
  {
    $this->requestBased = $requestBased;
  }
  /**
   * @return RequestBasedSli
   */
  public function getRequestBased()
  {
    return $this->requestBased;
  }
  /**
   * @param WindowsBasedSli
   */
  public function setWindowsBased(WindowsBasedSli $windowsBased)
  {
    $this->windowsBased = $windowsBased;
  }
  /**
   * @return WindowsBasedSli
   */
  public function getWindowsBased()
  {
    return $this->windowsBased;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceLevelIndicator::class, 'Google_Service_Monitoring_ServiceLevelIndicator');
