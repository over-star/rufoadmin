<?php

namespace Overtrue\EasySms\Strategies;

use Rufo\Request\Support\MongoDBHelper;
use Rufo\Ruquest\Contracts\LogInterface;

/**
 * Class MongoDBStrategy.
 */
class MongoDBStrategy implements LogInterface
{

    public function put($message, $status)
    {
        $manager = MongoDBHelper::getMongoDB();
//        $cursor=$manager->query2('sites',['x' => ['$gt' => 1]]);
//
//        foreach ($cursor as $document) {
//            print_r($document->x);
//        }
        $updates = [
            [
                "q"     => ["x" => "3"],
                "u"     => ['$set' => ["sites.name" => "213123"]],
                "multi" => true,
            ],
        ];
        $rs = $manager->update('sites', $updates);
        print_r($rs->toArray());
        dd(11);

    }

    public function get($number, $strategy)
    {
        // TODO: Implement get() method.
    }
}
