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

namespace Magento\Reports\Test\Constraint;

use Magento\Sales\Test\Fixture\OrderInjectable;

/**
 * Class AssertInvoiceReportIntervalResult
 * Assert that invoice info in report grid is actual
 */
class AssertInvoiceReportIntervalResult extends AbstractAssertInvoiceReportResult
{
    /**
     * Constraint severeness
     *
     * @var string
     */
    protected $severeness = 'low';

    /**
     * Assert that sales info in report grid is actual
     *
     * @param OrderInjectable $order
     * @param array $invoiceReport
     * @param array $initialInvoiceResult
     * @return void
     */
    public function processAssert(OrderInjectable $order, array $invoiceReport, array $initialInvoiceResult)
    {
        $this->order = $order;
        $this->searchInInvoiceReportGrid($invoiceReport);
        $invoiceResult = $this->salesInvoiceReport->getGridBlock()->getLastResult();
        $prepareInitialResult = $this->prepareExpectedResult($initialInvoiceResult);
        \PHPUnit_Framework_Assert::assertEquals(
            $prepareInitialResult,
            $invoiceResult,
            "Invoice report interval result not contains actual data."
        );
    }

    /**
     * Returns a string representation of the object
     *
     * @return string
     */
    public function toString()
    {
        return 'Invoice report interval result contains actual data.';
    }
}
