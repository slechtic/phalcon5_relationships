<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller {

	public function indexAction() {

		// Example with non-existing entity in database

		echo "<h1>Non-saved entity</h1>";

		$documentHistory = new DocumentHistory();

		$document = Document::findFirst(1);

		echo 'Current document number: ' . $document->getNumber() . '<br/>';

		$document->setNumber('1.2');

		echo 'Document number changed to: ' . $document->getNumber() . '<br/>';

		$documentHistory->setDocument($document);
		$documentHistory->save();

		echo 'Document number after saving: ' . $document->getNumber() . '<br/>';

		$document->refresh();

		echo '<strong>Document number after refreshing entity from DB: ' . $document->getNumber() . '</strong><br/>';


		// Example with existing entity in database

		echo "<h1>Existing entity in database</h1>";

		$existingDocumentHistory = DocumentHistory::findFirst(1);

		$relatedDocument = $existingDocumentHistory->getDocument();

		echo 'Current document number: ' . $relatedDocument->getNumber() . '<br/>';

		$relatedDocument->setNumber('2.1');

		echo 'Document number changed to: ' . $relatedDocument->getNumber() . '<br/>';

		$existingDocumentHistory->save();

		echo 'Document number after saving: ' . $relatedDocument->getNumber() . '<br/>';

		$relatedDocument->refresh();

		echo '<strong>Document number after refreshing entity from DB: ' . $relatedDocument->getNumber() . '</strong><br/>';
	}
}