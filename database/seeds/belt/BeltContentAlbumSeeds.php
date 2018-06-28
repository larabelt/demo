<?php

use Belt\Content\Album;
use Belt\Content\Attachment;
use Illuminate\Database\Seeder;

class BeltContentAlbumSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Album::class, 25)->create();

        $album = Album::first();

        factory(Attachment::class, 25)
            ->create()
            ->each(function ($attachment) use ($album) {
                $album->attachments()->attach($attachment);
            });;
    }
}
