<?php 

return [
    'properties' => [
        'id' => \Belt\Content\Elastic\ElasticConfigHelper::property('primary_key'),
        'is_active' => \Belt\Content\Elastic\ElasticConfigHelper::property('boolean'),
        'name' => \Belt\Content\Elastic\ElasticConfigHelper::property('name'),
        'slug' => \Belt\Content\Elastic\ElasticConfigHelper::property('string'),
        'template' => \Belt\Content\Elastic\ElasticConfigHelper::property('string'),
        'body' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'meta_description' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'meta_keywords' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'meta_title' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'priority' => \Belt\Content\Elastic\ElasticConfigHelper::property('integer'),
        'rating' => \Belt\Content\Elastic\ElasticConfigHelper::property('float'),
        'searchable' => \Belt\Content\Elastic\ElasticConfigHelper::property('text'),
        'created_at' => \Belt\Content\Elastic\ElasticConfigHelper::property('integer'),
        'updated_at' => \Belt\Content\Elastic\ElasticConfigHelper::property('integer'),
        'categories' => \Belt\Content\Elastic\ElasticConfigHelper::property('long'),
        'tags' => \Belt\Content\Elastic\ElasticConfigHelper::property('long'),
        'location' => \Belt\Content\Elastic\ElasticConfigHelper::property('geo_point'),
    ],
];