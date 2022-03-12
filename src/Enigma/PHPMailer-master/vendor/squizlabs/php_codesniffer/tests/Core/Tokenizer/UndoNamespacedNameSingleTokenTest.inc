<?php

/* testNamespaceDeclaration */

namespace Package;

/* testNamespaceDeclarationWithLevels */

namespace Vendor\SubLevel\Domain;

/* testUseStatement */

use ClassName;
use Sublevel\PartiallyClassName;
use UnqualifiedClassName;
use Vendor\Level\{AnotherDomain,
    Sub\YetAnotherDomain,
    function function_grouped,
    function SubLevelA\function_grouped_too,
    const CONSTANT_GROUPED,
    const SubLevelB\CONSTANT_GROUPED_TOO,};
use Vendor\Level\Domain;
use function function_name;
use function Vendor\Level\function_in_ns;
use const CONSTANT_NAME;
use const Vendor\Level\OTHER_CONSTANT;

/* testUseStatementWithLevels */

/* testFunctionUseStatement */

/* testFunctionUseStatementWithLevels */

/* testConstantUseStatement */

/* testConstantUseStatementWithLevels */

/* testMultiUseUnqualified */

/* testGroupUseStatement */

/* testClassName */

class MyClass
    /* testExtendedFQN */
    extends \Vendor\Level\FQN
    /* testImplementsRelative */
    implements namespace\Name,
    /* testImplementsFQN */
    \Fully\Qualified,
    /* testImplementsUnqualified */
    Unqualified,
    /* testImplementsPartiallyQualified */
    Sub\Level\Name
{
    /* testFunctionName */
    public function function_name(
        /* testTypeDeclarationRelative */
        ?namespace\Name|object $paramA,

        /* testTypeDeclarationFQN */
        \Fully\Qualified\Name  $paramB,

        /* testTypeDeclarationUnqualified */
        Unqualified|false      $paramC,

        /* testTypeDeclarationPartiallyQualified */
        ?Sublevel\Name         $paramD,

        /* testReturnTypeFQN */
    ): ?\Name
    {

        try {
            /* testFunctionCallRelative */
            echo namespace\function_name();

            /* testFunctionCallFQN */
            echo \Vendor\Package\function_name();

            /* testFunctionCallUnqualified */
            echo function_name();

            /* testFunctionPartiallyQualified */
            echo Level\function_name();

            /* testCatchRelative */
        } catch (namespace\SubLevel\Exception $e) {

            /* testCatchFQN */
        } catch (\Exception $e) {

            /* testCatchUnqualified */
        } catch (Exception $e) {

            /* testCatchPartiallyQualified */
        } catch (Level\Exception $e) {
        }

        /* testNewRelative */
        $obj = new namespace\ClassName();

        /* testNewFQN */
        $obj = new \Vendor\ClassName();

        /* testNewUnqualified */
        $obj = new ClassName;

        /* testNewPartiallyQualified */
        $obj = new Level\ClassName;

        /* testDoubleColonRelative */
        $value = namespace\ClassName::property;

        /* testDoubleColonFQN */
        $value = \ClassName::static_function();

        /* testDoubleColonUnqualified */
        $value = ClassName::CONSTANT_NAME;

        /* testDoubleColonPartiallyQualified */
        $value = Level\ClassName::CONSTANT_NAME['key'];

        /* testInstanceOfRelative */
        $is = $obj instanceof namespace\ClassName;

        /* testInstanceOfFQN */
        if ($obj instanceof \Full\ClassName) {
        }

        /* testInstanceOfUnqualified */
        if ($a === $b && $obj instanceof ClassName && true) {
        }

        /* testInstanceOfPartiallyQualified */
        $is = $obj instanceof Partially\ClassName;
    }
}

/* testInvalidInPHP8Whitespace */
namespace \ Sublevel
\ function_name();

/* testInvalidInPHP8Comments */
$value = \Fully
    // phpcs:ignore Stnd.Cat.Sniff -- for reasons
\Qualified
    /* comment */
\Name
    // comment
    :: function_name();
