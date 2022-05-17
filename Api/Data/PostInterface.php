<?php
/**
 * LeandroRosa
 *
 * NOTICE OF LICENSE
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to https://github.com/leandro-rosa for more information.
 *
 * @category LeandroRosa
 *
 * @copyright Copyright (c) 2022 Leandro Rosa (https://github.com/leandro-rosa)
 *
 * @author Leandro Rosa <dev.leandrorosa@gmail.com>
 */
declare(strict_types=1);

namespace LeandroRosa\Post\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface PostInterface extends ExtensibleDataInterface
{
    const ID = 'entity_id';
    const TITLE = 'title';
    const IDENTIFIER = 'identifier';
    const CONTENT = 'content';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME = 'update_time';
    const IS_ACTIVE = 'is_active';

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getIdentifier();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return string
     */
    public function getCreationTime();

    /**
     * @return string
     */
    public function getUpdateTime();

    /**
     * @return bool
     */
    public function getIsActive();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTitle($value): self;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setIdentifier($value): self;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setContent($value): self;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCreationTime($value): self;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUpdateTime($value): self;

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsActive(bool $value): self;
}
