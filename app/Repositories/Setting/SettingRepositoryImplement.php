<?php

namespace App\Repositories\Setting;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Setting;

class SettingRepositoryImplement extends Eloquent implements SettingRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Setting|mixed $settingModel;
     */
    protected $settingModel;

    public function __construct(Setting $settingModel)
    {
        $this->settingModel = $settingModel;
    }

    // Write something awesome :)
}
