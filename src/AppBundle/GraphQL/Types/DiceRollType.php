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

class DiceRollType extends AbstractObjectType
{
    public function build($config)
    {
            $config->addFields([
                'title'      => [
                    'type' => new StringType(),
                    'description'       => 'This field contains a post title',
                    'isDeprecated'      => true,
                    'deprecationReason' => 'field title is now deprecated',
                    'args'              => [
                        'truncate' => [
                          'type' => new BooleanType(),
                          'defaultValue' => false
                        ]
                    ],
                    'resolve'           => function ($source, $args) {
                        return (!empty($args['truncate'])) ? explode(' ', $source['title'])[0] . '...' : $source['title'];
                    }
                ],
                'summary'    => new StringType(),
                'likesCount' => new IntType(),
            ]);
    }


    //public function getInterfaces()
    //{
    //    return [new ContentBlockInterface()];
    //}
}
