<?php

use Phalcon\Mvc\Model;

class Document extends Model {
	
	/**
	 * @var int
	 */
    protected int $id;
	
	/**
	 * @var string
	 */
    protected string $number;
	
	public function initialize() {
		$this->setSource('documents');
		
		$this->hasMany('id', DocumentHistory::class, 'idDocument', ['alias' => 'documentHistories']);
	}
	
	/**
	 * @param array|null $parameters
	 * @return array|null
	 */
	public function getDocumentHistories(array $parameters = null): ?array {
		return $this->getRelated('documentHistories', $parameters);
	}
	
	/**
	 * @param array $documentHistories
	 * @return $this
	 */
	public function setDocumentHistories(array $documentHistories): Document {
		$this->documentHistories = $documentHistories;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNumber(): string {
		return $this->number;
	}
	
	/**
	 * @param string $number
	 */
	public function setNumber(string $number): void {
		$this->number = $number;
	}
	
	/**
	 * @return string[]
	 */
	public function columnMap()	{
		return [
			'id' => 'id',
			'number' => 'number'
		];
	}
 
}