<?php

namespace App\Services;

use App\Facades\UrlHelper;
use App\Models\Post;

class PostService
{
    public function initRoutePost(): void
    {
        $segments = (!empty($segments)) ? $segments : request()->segments();
        $Post = app(Post::class);
        $postId = 0;

        for ($i = 0; $i < count($segments); $i++) {
            $postId = UrlHelper::searchSlugSegments($Post, $this->getPostId(), $segments[$i]);
            if(!$postId) break;
        }

        return; $this->findView($postId);
    }

    public function findView($postId)
    {
        $template =  Post::find($postId)->getTemplate;

        return [
            'template' => 'post.' . $template->getName(),
            'parameters' => json_decode($template->params)
        ];
    }
}
