<?php

use Phalcon\Mvc\Model;

class DocumentHistory extends Model {
	
	/**
	 * @var int
	 */
    protected $id;
	
	/**
	 * @var string
	 */
    protected $eventType;
	
	public function initialize() {
		$this->setSource('document_histories');
		
		$this->belongsTo('idDocument', Document::class, 'id',['alias' => 'document']);
	}
	
	/**
	 * @param array|null $parameters
	 * @return array|null
	 */
	public function getDocument(array $parameters = null): ?Document {
		return $this->getRelated('document', $parameters);
	}
	
	/**
	 * @param Document $document
	 * @return $this
	 */
	public function setDocument(Document $document): DocumentHistory {
		$this->document = $document;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getEventType(): string {
		return $this->eventType;
	}
	
	/**
	 * @param string $eventType
	 */
	public function setEventType(string $eventType): void {
		$this->eventType = $eventType;
	}
	
	/**
	 * @return string[]
	 */
	public function columnMap()	{
		return [
			'id' => 'id',
			'event_type' => 'eventType',
			'id_document' => 'idDocument'
		];
	}
 
}