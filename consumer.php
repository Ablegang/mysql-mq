<?php
// +----------------------------------------------------------------------
// | consumer.php
// +----------------------------------------------------------------------
// | Description: 消费者
// +----------------------------------------------------------------------
// | Time: 2018/12/19 下午4:55
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

include_once 'boot.php';

try {

    Queue::init();

    while (1) {

        $job = Queue::reserve('test');
        if (!$job->isEmpty()) {
            echo $job->job_data . PHP_EOL;
            sleep(2);
            if (Queue::delete($job)) {
                echo "job was deleted" . PHP_EOL;
            } else {
                echo "delete failed" . PHP_EOL;
            }
        }
    }

} catch (Exception $e) {
    var_dump($e->getMessage());
}