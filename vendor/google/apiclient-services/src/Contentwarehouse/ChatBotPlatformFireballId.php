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

namespace Google\Service\Contentwarehouse;

class ChatBotPlatformFireballId extends \Google\Model
{
  /**
   * @var GoogleInternalCommunicationsInstantmessagingV1Id
   */
  public $id;
  protected $idType = GoogleInternalCommunicationsInstantmessagingV1Id::class;
  protected $idDataType = '';

  /**
   * @param GoogleInternalCommunicationsInstantmessagingV1Id
   */
  public function setId(GoogleInternalCommunicationsInstantmessagingV1Id $id)
  {
    $this->id = $id;
  }
  /**
   * @return GoogleInternalCommunicationsInstantmessagingV1Id
   */
  public function getId()
  {
    return $this->id;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChatBotPlatformFireballId::class, 'Google_Service_Contentwarehouse_ChatBotPlatformFireballId');
