<?php
/**
 * BannerType.php
 */

namespace AppBundle\GraphQL\Types;

use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\BooleanType;

use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;


class DiceRollField extends AbstractField
{
    public function getName() {
      return 'diceRoll00';
    }

    public function getDescription() {
      return 'Это описания поля';
    }

    public function getType()
    {
      return new DiceRollType();
    }

    public function resolve($value, array $args, ResolveInfo $info) {
      return ['title' => 'wewew', 'summary' => 'ddfdfdfd', 'likesCount' => 126];
    }


    //public function getInterfaces()
    //{
    //    return [new ContentBlockInterface()];
    //}
}
