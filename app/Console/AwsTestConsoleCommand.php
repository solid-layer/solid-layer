<?php

namespace App\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class AwsTestConsoleCommand extends BaseCommand
{
    protected $name = 'aws:test';

    protected $description = 'AWS Test';


    public function slash()
    {
        # ---- pull the alias from DI 'aws' using the magic method __call
        # ---- let's create a client using 's3'
        $s3 = $this->aws->createClient('s3');


        # ---- let's get the file name
        $file_name = 'bootstrap.min.css';


        # ---- bucket name located in your s3 console
        $bucket = 'phalconslayer';


        # ---- the key to use to access the object later on
        $key = 'css/' . basename($file_name);


        # ---- PUT, means adding a new content
        # it's like $bucket[$key] = $body; we're just like storing a value from array
        $s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $key,
            'Body'   => fopen(public_path('css/'.$file_name), 'r'),

            # - URL: 
            # https://docs.aws.amazon.com/AmazonS3/latest/dev/acl-overview.html#canned-acl
            'ACL'    => 'public-read',
        ]);


        # ---- GET, means get the content from the object using key
        # echo $bucket[$key] should return the $body, it's like showing something that
        # was stored from a bucket.
        // $obj = $s3->getObject([
        //     'Bucket' => $bucket,
        //     'Key'    => $key,
        // ]);
        // echo $obj['Body'];


        # ---- GET by url, you could also get the url
        $this->comment($s3->getObjectUrl($bucket, $key));
    }
}