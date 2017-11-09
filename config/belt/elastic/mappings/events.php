<?php 

return [
    'properties' => [
        'id' => \Belt\Content\Elastic\ElasticConfigHelper::property('primary_key'),
        'is_active' => \Belt\Content\Elastic\ElasticConfigHelper::property('boolean'),
        'priority' => \Belt\Content\Elastic\ElasticConfigHelper::property('integer'),
        'name' => \Belt\Content\Elastic\ElasticConfigHelper::property('name'),
        'slug' => \Belt\Content\Elastic\ElasticConfigHelper::property('string'),
        'template' => \Belt\Content\Elastic\ElasticConfigHelper::property('string'),
        'body' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'meta_description' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'meta_keywords' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'meta_title' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'searchable' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'starts_at' => \Belt\Content\Elastic\ElasticConfigHelper::property('datetime'),
        'ends_at' => \Belt\Content\Elastic\ElasticConfigHelper::property('datetime'),
        'created_at' => \Belt\Content\Elastic\ElasticConfigHelper::property('datetime'),
        'updated_at' => \Belt\Content\Elastic\ElasticConfigHelper::property('datetime'),
    ],
];