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

namespace LeandroRosa\Post\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use LeandroRosa\Post\Api\Data\PostInterface;
use LeandroRosa\Post\Model\ResourceModel\Post as ResourceModel;

class Post extends AbstractExtensibleModel implements PostInterface
{
    /**
     * @inheirtDoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function getIdentifier()
    {
        return $this->getData(self::IDENTIFIER);
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * @inheritDoc
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * @inheritDoc
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle($value): PostInterface
    {
        return $this->setData(self::TITLE, $value);
    }

    /**
     * @inheritDoc
     */
    public function setIdentifier($value): PostInterface
    {
        return $this->setData(self::IDENTIFIER, $value);
    }

    /**
     * @inheritDoc
     */
    public function setContent($value): PostInterface
    {
        return $this->setData(self::CONTENT, $value);
    }

    /**
     * @inheritDoc
     */
    public function setCreationTime($value): PostInterface
    {
        return $this->setData(self::CREATION_TIME, $value);
    }

    /**
     * @inheritDoc
     */
    public function setUpdateTime($value): PostInterface
    {
        return $this->setData(self::UPDATE_TIME, $value);
    }

    /**
     * @inheritDoc
     */
    public function setIsActive(bool $value): PostInterface
    {
        return $this->setData(self::IS_ACTIVE, $value);
    }
}
