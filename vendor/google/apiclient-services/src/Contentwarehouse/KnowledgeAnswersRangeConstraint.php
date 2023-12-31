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

class KnowledgeAnswersRangeConstraint extends \Google\Model
{
  /**
   * @var KnowledgeAnswersRangeConstraintRangeEndpoint
   */
  public $max;
  protected $maxType = KnowledgeAnswersRangeConstraintRangeEndpoint::class;
  protected $maxDataType = '';
  /**
   * @var KnowledgeAnswersRangeConstraintRangeEndpoint
   */
  public $min;
  protected $minType = KnowledgeAnswersRangeConstraintRangeEndpoint::class;
  protected $minDataType = '';

  /**
   * @param KnowledgeAnswersRangeConstraintRangeEndpoint
   */
  public function setMax(KnowledgeAnswersRangeConstraintRangeEndpoint $max)
  {
    $this->max = $max;
  }
  /**
   * @return KnowledgeAnswersRangeConstraintRangeEndpoint
   */
  public function getMax()
  {
    return $this->max;
  }
  /**
   * @param KnowledgeAnswersRangeConstraintRangeEndpoint
   */
  public function setMin(KnowledgeAnswersRangeConstraintRangeEndpoint $min)
  {
    $this->min = $min;
  }
  /**
   * @return KnowledgeAnswersRangeConstraintRangeEndpoint
   */
  public function getMin()
  {
    return $this->min;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersRangeConstraint::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersRangeConstraint');
