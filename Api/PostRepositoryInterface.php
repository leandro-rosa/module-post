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

namespace LeandroRosa\Post\Api;

use LeandroRosa\Post\Api\Data\PostInterface;
use LeandroRosa\Framework\Api\GenericRepositoryInterface;

interface PostRepositoryInterface extends GenericRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return \LeandroRosa\Post\Api\Data\PostInterface
     */
    public function getById(int $id): PostInterface;

    /**
     * @param string $identifier
     *
     * @return \LeandroRosa\Post\Api\Data\PostInterface
     */
    public function getByIdentifier(string $identifier): PostInterface;

    /**
     * @return \LeandroRosa\Post\Api\Data\PostInterface[]
     */
    public function getActivatedPostList(): array;

    /**
     * @param \LeandroRosa\Post\Api\Data\PostInterface $entity
     *
     * @return \LeandroRosa\Post\Api\Data\PostInterface
     */
    public function save($entity);
}
