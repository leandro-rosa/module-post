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

use LeandroRosa\Post\Api\Data\PostInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use LeandroRosa\Post\Model\ResourceModel\Post as ResourceModel;
use LeandroRosa\Post\Model\ResourceModel\Post\CollectionFactory;
use LeandroRosa\Post\Api\PostRepositoryInterface;
use LeandroRosa\Framework\Model\Repository\GenericRepository;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\InvalidArgumentException;
use Magento\Framework\Exception\NoSuchEntityException;

class PostRepository extends GenericRepository implements PostRepositoryInterface
{
    /**
     * PostRepository constructor.
     *
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ResourceModel $resource
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     * @param PostFactory $postFactory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ResourceModel $resource,
        CollectionProcessorInterface $collectionProcessor,
        SearchResultsInterfaceFactory $searchResultsFactory,
        PostFactory $postFactory,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($searchCriteriaBuilder, $resource, $collectionProcessor, $searchResultsFactory);
        $this->entityFactory = $postFactory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheirtDoc
     *
     * @throws InvalidArgumentException
     * @throws NoSuchEntityException
     */
    public function getById(int $id): PostInterface
    {
        return $this->get($id);
    }

    /**
     * @inheirtDoc
     *
     * @throws InvalidArgumentException
     * @throws NoSuchEntityException
     */
    public function getByIdentifier(string $identifier): PostInterface
    {
        return $this->get($identifier, PostInterface::IDENTIFIER);
    }

    /**
     * @inheirtDoc
     *
     * @throws InvalidArgumentException
     */
    public function getActivatedPostList(): array
    {
        $criteria = $this->searchCriteriaBuilder
            ->addFilter(PostInterface::IS_ACTIVE, true)
            ->create();

        $items = $this->getList($criteria)->getItems();

        return $items;
    }

    /**
     * @inheirtDoc
     *
     * @throws CouldNotSaveException
     */
    public function save($entity)
    {
        try {
            $model = $this->getByIdentifier($entity->getIdentifier());
            foreach ($entity->getData() as $key => $value) {
                $model->setData($key, $value);
            }
        } catch (\Exception $exception) {
            $model = $entity;
        }

        return parent::save($model);
    }
}
