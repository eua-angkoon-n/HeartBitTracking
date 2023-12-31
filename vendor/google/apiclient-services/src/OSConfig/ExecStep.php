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

namespace Google\Service\OSConfig;

class ExecStep extends \Google\Model
{
  /**
   * @var ExecStepConfig
   */
  public $linuxExecStepConfig;
  protected $linuxExecStepConfigType = ExecStepConfig::class;
  protected $linuxExecStepConfigDataType = '';
  /**
   * @var ExecStepConfig
   */
  public $windowsExecStepConfig;
  protected $windowsExecStepConfigType = ExecStepConfig::class;
  protected $windowsExecStepConfigDataType = '';

  /**
   * @param ExecStepConfig
   */
  public function setLinuxExecStepConfig(ExecStepConfig $linuxExecStepConfig)
  {
    $this->linuxExecStepConfig = $linuxExecStepConfig;
  }
  /**
   * @return ExecStepConfig
   */
  public function getLinuxExecStepConfig()
  {
    return $this->linuxExecStepConfig;
  }
  /**
   * @param ExecStepConfig
   */
  public function setWindowsExecStepConfig(ExecStepConfig $windowsExecStepConfig)
  {
    $this->windowsExecStepConfig = $windowsExecStepConfig;
  }
  /**
   * @return ExecStepConfig
   */
  public function getWindowsExecStepConfig()
  {
    return $this->windowsExecStepConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExecStep::class, 'Google_Service_OSConfig_ExecStep');
