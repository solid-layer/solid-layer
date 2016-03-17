<?php
namespace Components\Console;

use Queue;
use Exception;

class QueueWorker extends Console
{
    protected $name = 'queue:worker';
    protected $description = 'Generalized Queue Worker';

    public function slash()
    {
        # Like wise, we will be running an infinite loop

        while (true) {

            try {

                while ( ($job = Queue::peekReady()) !== false ) {

                    $body = $job->getBody();

                    # This worker only focuses that has a class on it
                    # which refers to the components/Queue/<class>
                    if ( isset($body['class']) ) {

                        $exploded_class = explode('@', $body['class']);
                        $method = 'fire';

                        if ( isset($exploded_class[1]) ) {
                            $method = $exploded_class[1];
                        }

                        (new $exploded_class[0])->{$method}($this, $job, $body['data']);
                    }
                }

            } catch (Exception $e) {

                $this->exception($e);
            }
        }
    }
}
