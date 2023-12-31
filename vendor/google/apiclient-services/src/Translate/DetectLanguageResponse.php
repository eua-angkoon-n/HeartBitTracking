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

namespace Google\Service\Translate;

class DetectLanguageResponse extends \Google\Collection
{
  protected $collection_key = 'languages';
  /**
   * @var DetectedLanguage[]
   */
  public $languages;
  protected $languagesType = DetectedLanguage::class;
  protected $languagesDataType = 'array';

  /**
   * @param DetectedLanguage[]
   */
  public function setLanguages($languages)
  {
    $this->languages = $languages;
  }
  /**
   * @return DetectedLanguage[]
   */
  public function getLanguages()
  {
    return $this->languages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DetectLanguageResponse::class, 'Google_Service_Translate_DetectLanguageResponse');
