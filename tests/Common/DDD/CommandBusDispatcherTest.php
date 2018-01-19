<?php

namespace EspServer\Common\DDD;


use PHPUnit\Framework\TestCase;

class CommandBusDispatcherTest extends TestCase
{
    
    public function testItDispatch()
    {
        $command = new DummyCommand();
        $commandHandler = new DummyCommandHandler();
        $expectedCommandResponse = $commandHandler->handle($command);
        $queryHandlerCollection = [$commandHandler->listenTo()=>$commandHandler];
        $handlerMap = new InMemoryCommandHandlerMap($queryHandlerCollection);
        $commandBusDispatcher = new DispatcherCommandBus($handlerMap);
    
        $commandResponse = $commandBusDispatcher->dispatch($command);
        
        $this->assertEquals($expectedCommandResponse->value(), $commandResponse->value());
        
        
    }
}

class DummyCommand implements Command
{
    
    public function __construct()
    {
    }
}

class DummyCommandHandler implements CommandHandler
{
    
    public function handle(Command $command): CommandResponse
    {
        return CommandResponse::withValue('Yes');
    }
    
    public function listenTo(): string
    {
        return DummyCommand::class;
    }
}