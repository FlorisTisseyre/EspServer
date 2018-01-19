<?php


namespace EspServer\Common\DDD;


class DispatcherCommandBus implements CommandBus
{
    
    /** @var InMemoryQueryHandlerMap */
    private $handlerMap;
    
    public function __construct(InMemoryCommandHandlerMap $handlerMap)
    {
    
        $this->handlerMap = $handlerMap;
    }
    
    
    public function dispatch(Command $command): CommandResponse
    {
        $commandHandler = $this->handlerMap->getCommandHandler(get_class($command));
        return $commandHandler->handle($command);
    }
}