<?php 

return [
    'properties' => [
        'id' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('primary_key'),
        'is_active' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('boolean'),
        'name' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('name'),
        'slug' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('string'),
        'template' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('string'),
        'body' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('text'),
        'meta_description' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('text'),
        'meta_keywords' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('text'),
        'meta_title' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('text'),
        'searchable' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('text'),
        'starts_at' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('datetime'),
        'ends_at' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('datetime'),
        'created_at' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('datetime'),
        'updated_at' => \Belt\Content\Search\Elastic\ElasticConfigHelper::property('datetime'),
    ],
];