<?php

namespace MolokaiStudio\ProductRegistry\Observer;


use MolokaiStudio\ProductRegistry\Model\Registry\CurrentProduct;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;


class InitProductObserver implements ObserverInterface
{
    /**
     * @var CurrentProduct
     */
    protected $currentProduct;

    public function __construct(CurrentProduct $currentProduct)
    {
        $this->currentProduct = $currentProduct;
    }

    public function execute(Observer $observer)
    {
        /** @var ProductInterface $product */
        $product = $observer->getData('product');
        $this->currentProduct->set($product);
    }
}