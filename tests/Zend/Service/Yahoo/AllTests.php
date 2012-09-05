<?php

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Service_Yahoo
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2008 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: AllTests.php 8055 2008-02-15 21:42:54Z thomas $
 */


if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Zend_Service_Yahoo_AllTests::main');
}


/**
 * Test helper
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'TestHelper.php';


/**
 * PHPUnit_Framework_TestSuite
 */
require_once 'PHPUnit/Framework/TestSuite.php';


/**
 * PHPUnit_TextUI_TestRunner
 */
require_once 'PHPUnit/TextUI/TestRunner.php';


/**
 * @see Zend_Service_Yahoo_OfflineTest
 */
require_once 'Zend/Service/Yahoo/OfflineTest.php';


/**
 * @see Zend_Service_Yahoo_OnlineTest
 */
require_once 'Zend/Service/Yahoo/OnlineTest.php';


/**
 * @category   Zend
 * @package    Zend_Service_Yahoo
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2008 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Service_Yahoo_AllTests
{
    /**
     * Runs this test suite
     *
     * @return void
     */
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    /**
     * Creates and returns this test suite
     *
     * @return PHPUnit_Framework_TestSuite
     */
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Zend Framework - Zend_Service_Yahoo');

        $suite->addTestSuite('Zend_Service_Yahoo_OfflineTest');

        if (defined('TESTS_ZEND_SERVICE_YAHOO_ONLINE_ENABLED') &&
            constant('TESTS_ZEND_SERVICE_YAHOO_ONLINE_ENABLED') !== false) {
            $suite->addTestSuite('Zend_Service_Yahoo_OnlineTest');
        } else {
            $suite->addTestSuite('Zend_Service_Yahoo_OnlineTest_Skip');
        }

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Zend_Service_Yahoo_AllTests::main') {
    Zend_Service_Yahoo_AllTests::main();
}
