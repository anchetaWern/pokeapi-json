<?php
class ArticlesDesignDocument implements \Doctrine\CouchDB\View\DesignDocument
{
    public function getData()
    {
        return array(
            'language' => 'javascript',
            'views' => array(
                'by_author' => array(
                    'map' => 'function(doc) {
                        if(\'article\' == doc.type) {
                            emit(doc.author, doc._id);
                        }
                    }',
                    'reduce' => '_count'
                ),
            ),
        );
    }
}