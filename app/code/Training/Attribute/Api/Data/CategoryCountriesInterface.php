<?php
/**
 * Created by PhpStorm.
 * User: Марфуша
 * Date: 19.01.2018
 * Time: 20:11
 */
interface CategoryCountriesInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    /**
     * @return int|null Sample(or link) id
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     * @return $this
     */
    public function setSortOrder($sortOrder);



    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Magento\Downloadable\Api\Data\LinkExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Magento\Downloadable\Api\Data\LinkExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Magento\Downloadable\Api\Data\LinkExtensionInterface $extensionAttributes);

}