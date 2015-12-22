<?php
namespace Components\Console;

use Queue;

class QueueWorker extends Console
{
    protected $name = 'queue:worker';
    protected $description = 'Generalized Queue Worker';

    public function slash()
    {
        # Like wise, we will be running an infinite loop

        while (true) {

            while ( ($job = Queue::peekReady()) !== false ) {

                $body = $job->getBody();

                # This worker only focuses.

                if ( isset($body['class']) ) {

                    $exploded_class = explode('@', $body['class']);
                    $method = 'fire';

                    if ( isset($exploded_class[1]) ) {
                        $method = $exploded_class[1];
                    }

                    (new $exploded_class[0])->{$method}($this, $job, $body['data']);
                }
            }


            # How many seconds should we stop if there is no job in the queue.

            sleep(5);
        }
    }
}
