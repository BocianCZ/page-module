<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Page\Events\ContentIsRendering;

class PageTranslation extends Model
{
    protected $table = 'page__page_translations';
    protected $fillable = [
        'page_id',
        'title',
        'slug',
        'status',
        'body',
        'meta_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image',
        'og_type',
    ];

    public function getBodyAttribute($body)
    {
        event($event = new ContentIsRendering($body));

        return $event->getBody();
    }
}
