<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Framework\Search\Request\Filter;

use Magento\Framework\Search\Request\FilterInterface;

/**
 * Bool Filter
 */
class Bool implements FilterInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Filter names to which result set MUST satisfy
     *
     * @var array
     */
    protected $must = array();

    /**
     * Filter names to which result set SHOULD satisfy
     *
     * @var array
     */
    protected $should = array();

    /**
     * Filter names to which result set MUST NOT satisfy
     *
     * @var array
     */
    protected $mustNot = array();

    /**
     * @param string $name
     * @param array $must
     * @param array $should
     * @param array $not
     */
    public function __construct($name, array $must = [], array $should = [], array $not = [])
    {
        $this->name = $name;
        $this->must = $must;
        $this->should = $should;
        $this->mustNot = $not;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return FilterInterface::TYPE_BOOL;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get Must filters
     *
     * @return \Magento\Framework\Search\Request\FilterInterface[]
     */
    public function getMust()
    {
        return $this->must;
    }

    /**
     * Get Should filters
     *
     * @return \Magento\Framework\Search\Request\FilterInterface[]
     */
    public function getShould()
    {
        return $this->should;
    }

    /**
     * Get Must Not filters
     *
     * @return \Magento\Framework\Search\Request\FilterInterface[]
     */
    public function getMustNot()
    {
        return $this->mustNot;
    }
}
