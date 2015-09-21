<?php
namespace Awildeep\DisqueBundle\Services;
use Disque\Client;

class DisqueClientService {
    /**
     * @var
     */
    private $autoconnect;

    /**
     * @var Client
     */
    private $disque;

    /**
     * @param $servers
     * @param $autoconnect
     */
    function __construct ($servers, $autoconnect, $connectionTimeout) {

        $this->disque = new Client ();
        foreach ($servers as $server) {
            $this->disque->addServer($server['server'], $server['port'], $server['password']);
        }

        if ($autoconnect) {
            $this->connect(['timeout' => $connectionTimeout]);
        }
        $this->autoconnect = $autoconnect;
    }

    /**
     * @return Client
     */
    public function getClient () {
        return $this->disque;
    }

    /**
     * @param array $options
     * @return array
     * @throws
     */
    public function connect($options = []) {
        if (!$this->autoconnect) {
            return $this->disque->connect($options);
        } else {
            throw new \Exception ('Connection already established via autoconnect, no need to call connect()');
        }

    }

    /**
     * @param $name
     * @return \Disque\Queue\Queue
     */
    public function queue ($name) {
        return $this->disque->queue($name);
    }
}