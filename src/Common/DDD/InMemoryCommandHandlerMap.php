<?php


namespace EspServer\Common\DDD;


class InMemoryCommandHandlerMap implements CommandHandlerMap
{
    /** @var array */
    private $commandHandlerCollection;
    
    public function __construct(array $commandHandlerCollection)
    {
        $this->commandHandlerCollection = $commandHandlerCollection;
    }
    
    public function getCommandHandler(string $commandClass): CommandHandler
    {
        if (!$this->commandExists($commandClass)) {
            throw new NotFoundCommandHandlerException("Command Handler not found for $commandClass command");
        }
        
        return $this->commandHandlerCollection[$commandClass];
    }
    
    protected function commandExists(string $commandClass): bool
    {
        return isset($this->commandHandlerCollection[$commandClass]);
    }
}