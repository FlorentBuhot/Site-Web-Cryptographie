<?php
/**
 * Unit test class for the CSSLint sniff.
 *
 * @author    Juliette Reinders Folmer <phpcs_nospam@adviesenzo.nl>
 * @copyright 2019 Juliette Reinders Folmer. All rights reserved.
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 */

namespace PHP_CodeSniffer\Standards\Generic\Tests\Debug;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class CSSLintUnitTest extends AbstractSniffUnitTest
{


    /**
     * Returns the lines where errors should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of errors that should occur on that line.
     *
     * @return array<int, int>
     */
    public function getErrorList()
    {
        return [];

    }//end shouldSkipTest()

/**
     * Returns the lines where warnings should occur.
     *
     * The key of the array should represent the line number and the value
     * should represent the number of warnings that should occur on that line.
     *
     * @return array<int, int>
     */
    public function getWarningList()
    {
        return [
            3 => 1,
            4 => 1,
            5 => 1,
        ];

    }//end getErrorList()

/**
     * Should this test be skipped for some reason.
     *
     * @return void
     */
    protected function shouldSkipTest()
    {
        $csslintPath = Config::getExecutablePath('csslint');
        if ($csslintPath === null) {
            return true;
        }

        return false;

    }//end getWarningList()


}//end class