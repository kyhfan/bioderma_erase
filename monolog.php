<?php
    // require 'lib/vendor/autoload.php';
    require_once __DIR__.'/lib/vendor/autoload.php';

    use \Monolog\Logger as Logger;
    use Monolog\Handler\StreamHandler;
    use Monolog\Registry;

    // 로깅 시간을 대한민국으로 설정 
    date_default_timezone_set('Asia/Seoul'); 
    
    // Monolog 오브젝트를 생성 
    // $log = new Logger('Application'); 
    
    // 파일시스템 핸들러를 추가한다. 
    // $log->pushHandler(new StreamHandler('./var/log/app.log', Logger::INFO)); 
    
    // add records to the log
    // $log->addInfo('Info log');
    // Debug 는 Info 레벨보다 낮으므로 아래 로그는 출력되지 않음
    // $log->addDebug('Debug log');
    // $log->addError('Error log');

    // Handler 생성 (표준 출력)
    $handler = new StreamHandler('php://stdout');
    
    // Logger 생성
    $logger = new Logger('ApplicationLog');
    
    // Logger에 Handler 넣기
    $logger->pushHandler($handler);
    
    // 로그 기록하기
    $logger->info(LOG_TEXT);

    Registry::addLoger($log);