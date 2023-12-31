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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowV2beta1IntentMessageCarouselSelectItem extends \Google\Model
{
  /**
   * @var string
   */
  public $description;
  /**
   * @var GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public $image;
  protected $imageType = GoogleCloudDialogflowV2beta1IntentMessageImage::class;
  protected $imageDataType = '';
  /**
   * @var GoogleCloudDialogflowV2beta1IntentMessageSelectItemInfo
   */
  public $info;
  protected $infoType = GoogleCloudDialogflowV2beta1IntentMessageSelectItemInfo::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public function setImage(GoogleCloudDialogflowV2beta1IntentMessageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudDialogflowV2beta1IntentMessageSelectItemInfo
   */
  public function setInfo(GoogleCloudDialogflowV2beta1IntentMessageSelectItemInfo $info)
  {
    $this->info = $info;
  }
  /**
   * @return GoogleCloudDialogflowV2beta1IntentMessageSelectItemInfo
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowV2beta1IntentMessageCarouselSelectItem::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1IntentMessageCarouselSelectItem');
