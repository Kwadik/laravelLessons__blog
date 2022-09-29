<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public function store($data) {

        try {

            Db::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIDs = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post = Post::firstOrCreate($data);
            if (isset($tagIDs)) {
                $post->tags()->attach($tagIDs);
            }

            Db::commit();

        } catch (\Exception $exception) {

            Db::rollBack();

            return $exception->getMessage();
        }
    }

    public function update(Post $post, $data) {

        try {

            Db::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIDs = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);
            if (isset($tagIDs)) {
                $post->tags()->sync($tagIDs);
            }

            Db::commit();

        } catch (\Exception $exception) {

            Db::rollBack();

            return $exception->getMessage();
        }

        return $post->fresh();
    }

    // may be unused
    private function getCategoryId($item) {

        return $item['id'] ?? Category::create($item)->id;
    }

    private function getCategoryIdWithUpdate($item) {

        if (isset($item['id'])) {

            $category = Tag::find($item['id'])->update($item);
            $category->update($item);
            $category = $category->fresh();

        } else {

            $category = Category::create($item);
        }

        return $category->id;
    }

    private function getTagIds($tags) {

        $tagIDs = [];

        foreach ($tags as $tag) {
            $tag = isset($tag['id']) ? Tag::find($tag['id']) : Tag::create($tag);
            $tagIDs[] = $tag->id;
        }

        return $tagIDs;
    }

    private function getTagIdsWithUpdate($tags) {

        $tagIDs = [];

        foreach ($tags as $tag) {

            if (isset($tag['id'])) {

                $tag = Tag::find($tag['id'])->update($tag);
                $tag->update($tag);
                $tag = $tag->fresh();

            } else {

                $tag = Tag::create($tag);
            }

            $tagIDs[] = $tag->id;
        }

        return $tagIDs;
    }
}
