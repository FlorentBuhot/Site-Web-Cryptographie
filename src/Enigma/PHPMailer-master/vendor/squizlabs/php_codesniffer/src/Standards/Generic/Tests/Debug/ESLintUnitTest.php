<?php
/**
 * Unit test class for the ESLint sniff.
 *
 * @author    Juliette Reinders Folmer <phpcs_nospam@adviesenzo.nl>
 * @copyright 2019 Juliette Reinders Folmer. All rights reserved.
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 */

namespace PHP_CodeSniffer\Standards\Generic\Tests\Debug;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Tests\Standards\AbstractSniffUnitTest;

class ESLintUnitTest extends AbstractSniffUnitTest
{

    /**
     * Basic ESLint config to use for testing the sniff.
     *
     * @var string
     */
    const ESLINT_CONFIG = '{
    "parserOptions": {
        "ecmaVersion": 5,
        "sourceType": "script",
        "ecmaFeatures": {}
    },
    "rules": {
        "no-undef": 2,
        "no-unused-vars": 2
    }
}';

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
        return [1 => 2];

    }//end setUp()

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
        return [];

    }//end tearDown()

/**
     * Sets up this unit test.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $cwd = getcwd();
        file_put_contents($cwd . '/.eslintrc.json', self::ESLINT_CONFIG);

    }//end shouldSkipTest()

/**
     * Remove artifact.
     *
     * @return void
     */
    protected function tearDown()
    {
        parent::tearDown();

        $cwd = getcwd();
        unlink($cwd . '/.eslintrc.json');

    }//end getErrorList()

/**
     * Should this test be skipped for some reason.
     *
     * @return void
     */
    protected function shouldSkipTest()
    {
        $eslintPath = Config::getExecutablePath('eslint');
        if ($eslintPath === null) {
            return true;
        }

        return false;

    }//end getWarningList()


}//end class
