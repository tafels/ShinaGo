<?php

namespace App\Services;

use App\Models\Catalog;
use App\Facades\UrlHelper;



class CatalogService extends BaseService
{
    public $catalogId = 0;
    public $view;
    public $parameters = [];

    /**
     * @return mixed
     */
    public function getCatalogId()
    {
        return $this->catalogId;
    }

    /**
     * @param mixed $catalogId
     */
    public function setCatalogId($catalogId): void
    {
        $this->catalogId = $catalogId;
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
     * @return bool
     */
    public function initRouteCatalog()
    {
        $segments = (!empty($segments)) ? $segments : request()->segments();
        $Catalog = app(Catalog::class);

        for ($i = 0; $i < count($segments); $i++) {
            $categoryId = UrlHelper::searchSlugSegments($Catalog, $this->getCatalogId(), $segments[$i]);
            if (!$categoryId) break;
            $this->setCatalogId($categoryId);
        }
    }

    public function findView()
    {
        $template =  Catalog::find($this->getCatalogId())->getTemplate;

        $this->setView('catalog.'.$template->name);
        $this->setParameters('template', json_decode($template->params));
    }


}
