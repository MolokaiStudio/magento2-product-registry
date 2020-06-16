<?php

namespace MolokaiStudio\ProductRegistry\Model\Registry;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;

class CurrentProduct
{
    /**
     * @var ProductInterface
     */
    protected $product;
    /**
     * @var ProductInterfaceFactory
     */
    protected $productFactory;

    public function __construct(ProductInterfaceFactory $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    public function set(ProductInterface $product) : void
    {
        $this->product = $product;
    }

    public function get() : ProductInterface
    {
        return $this->product ?? $this->getNull();
    }

    protected function getNull() : ProductInterface
    {
        return $this->productFactory->create();
    }
}