<?php

namespace App\Tasks\Server;

use App\Biz\Service\BasicService;
use App\Biz\KNN\KNearestNeighborsTraining;
use App\Biz\SVC\SupportVectorMachineTraining;
use App\Common\Logger\Rpc\LoggerHandler;
use App\Tasks\Task;
use Xin\Phalcon\Cli\Traits\Input;
use Xin\Swoole\Rpc\Server;

class ServiceTask extends Task
{
    use Input;

    public function mainAction()
    {
        $server = new Server();
        $pid = di('config')->application->pidsDir . 'service.pid';
        $rpc = di('config')->rpc;
        $daemonize = $this->option('daemonize', $rpc->daemonize);
        $host = $this->option('host', $rpc->host);
        $port = $this->option('port', $rpc->port);

        // 开启服务时，读取样本学习
        $SNN = KNearestNeighborsTraining::getInstance();
        $SVM = SupportVectorMachineTraining::getInstance();

        $server->setHandler('test', BasicService::getInstance());
        $server->setLoggerHandler(LoggerHandler::getInstance());
        $server->serve($host, $port, [
            'pid_file' => $pid,
            'daemonize' => $daemonize,
            'max_request' => 500,
            'open_eof_check' => true,
            'package_eof' => "\r\n",
        ]);
    }
}
