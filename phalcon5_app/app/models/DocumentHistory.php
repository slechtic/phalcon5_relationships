<?php

use Phalcon\Mvc\Model;

class DocumentHistory extends Model {
	
	/**
	 * @var int
	 */
    protected $id;
	
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
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id
	 */
	public function setId(int $id): void {
		$this->id = $id;
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
	 * @return string[]
	 */
	public function columnMap()	{
		return [
			'id' => 'id',
			'id_document' => 'idDocument'
		];
	}
}