<?php


namespace EspServer\Common\DDD;


final class InMemoryQueryHandlerMap implements QueryHandlerMap {
    
    /** @var array */
    private $queryHandlerCollection;
    
    public function __construct (array $queryHandlerCollection) {
        $this->queryHandlerCollection = $queryHandlerCollection;
    }
    
    public function getQueryHandler (string $query) {
        if (!$this->queryExists ($query)) {
            throw new NotFoundQueryHandlerException($query, __CLASS__);
        }
        
        return $this->queryHandlerCollection[$query];
    }
    
    protected function queryExists ($query): bool {
        return isset($this->queryHandlerCollection[$query]);
    }
}