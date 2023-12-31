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

namespace Google\Service\Spanner;

class TransactionSelector extends \Google\Model
{
  /**
   * @var TransactionOptions
   */
  public $begin;
  protected $beginType = TransactionOptions::class;
  protected $beginDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var TransactionOptions
   */
  public $singleUse;
  protected $singleUseType = TransactionOptions::class;
  protected $singleUseDataType = '';

  /**
   * @param TransactionOptions
   */
  public function setBegin(TransactionOptions $begin)
  {
    $this->begin = $begin;
  }
  /**
   * @return TransactionOptions
   */
  public function getBegin()
  {
    return $this->begin;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param TransactionOptions
   */
  public function setSingleUse(TransactionOptions $singleUse)
  {
    $this->singleUse = $singleUse;
  }
  /**
   * @return TransactionOptions
   */
  public function getSingleUse()
  {
    return $this->singleUse;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TransactionSelector::class, 'Google_Service_Spanner_TransactionSelector');
