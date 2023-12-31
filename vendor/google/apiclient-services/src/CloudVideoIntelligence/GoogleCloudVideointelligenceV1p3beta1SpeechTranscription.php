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

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1p3beta1SpeechTranscription extends \Google\Collection
{
  protected $collection_key = 'alternatives';
  /**
   * @var GoogleCloudVideointelligenceV1p3beta1SpeechRecognitionAlternative[]
   */
  public $alternatives;
  protected $alternativesType = GoogleCloudVideointelligenceV1p3beta1SpeechRecognitionAlternative::class;
  protected $alternativesDataType = 'array';
  /**
   * @var string
   */
  public $languageCode;

  /**
   * @param GoogleCloudVideointelligenceV1p3beta1SpeechRecognitionAlternative[]
   */
  public function setAlternatives($alternatives)
  {
    $this->alternatives = $alternatives;
  }
  /**
   * @return GoogleCloudVideointelligenceV1p3beta1SpeechRecognitionAlternative[]
   */
  public function getAlternatives()
  {
    return $this->alternatives;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1p3beta1SpeechTranscription::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1p3beta1SpeechTranscription');
