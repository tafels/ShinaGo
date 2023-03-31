<?php

namespace App\Services;

use App\Facades\UrlHelper;
use App\Models\Post;

class PostService
{
    public $postId = 0;
    public $view;
    public $parameters = [];

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId): void
    {
        $this->postId = $postId;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }


    /**
     * @param string $key
     * @param array|string $value
     * @return void
     */
    public function setParameters(string $key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * @param string $view
     */
    public function setView(string $view): void
    {
        $this->view = $view;
    }

    /**
     * @return void
     */
    public function initRoutePost(): void
    {
        $segments = (!empty($segments)) ? $segments : request()->segments();
        $Post = app(Post::class);

        for ($i = 0; $i < count($segments); $i++) {
            $categoryId = UrlHelper::searchSlugSegments($Post, $this->getPostId(), $segments[$i]);
            if(!$categoryId) break;
            $this->setPostId($categoryId);
        }
    }

    public function findView()
    {
        $template =  Post::find($this->getPostId())->getTemplate;

        $this->setView('post.'.$template->name);
        $this->setParameters('template', json_decode($template->params));
    }
}
