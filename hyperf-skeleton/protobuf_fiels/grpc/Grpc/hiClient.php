<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Grpc;

/**
 */
class hiClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Grpc\HiUser $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function sayHello(\Grpc\HiUser $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Grpc.hi/sayHello',
        $argument,
        ['\Grpc\HiReply', 'decode'],
        $metadata, $options);
    }

}
