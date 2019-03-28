<?php
namespace MailMarketing\Observers;

use \Cache;
use \Auth;
use \MailMarketing\Models\AbstractBaseModel;

abstract class AbstractModelObserver
{

    /**
     * Use cache property.
     *
     * @var boolean $userCache
     */
    protected $useCache = false;

    /**
     * User id that manage the model.
     *
     * @var integer $userId
     */
    protected $userId;

    public function __construct()
    {
        $userId = 1;
        if (\Auth::user()) {
            $userId = \Auth::user()->Usr_ID;
        }
        $this->userId = $userId;
    }

    /**
     * Observe creating action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return void
     */
    public function creating(AbstractBaseModel $model)
    {
    }

    /**
     * Observe created action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return void
     */
    public function created(AbstractBaseModel $model)
    {
    }

    /**
     * Observe updating action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return void
     */
    public function updating(AbstractBaseModel $model)
    {
    }

    /**
     * Observe updated action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return void
     */
    public function updated(AbstractBaseModel $model)
    {
    }

    /**
     * Observe saved action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return void
     */
    public function saved(AbstractBaseModel $model)
    {
    }

    /**
     * Observe saving action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return void
     */
    public function saving(AbstractBaseModel $model)
    {
    }

    /**
     * Observe deleted action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return void
     */
    public function deleted(AbstractBaseModel $model)
    {
    }

    /**
     * Observe deleting action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return mixed
     */
    public function deleting(AbstractBaseModel $model)
    {
    }

    /**
     * Clear tags cache.
     *
     * @param string $tags Tags parameter.
     *
     * @return void
     */
    protected function clearCacheTags($tags)
    {
        if ($this->useCache === true) {
            Cache::tags($tags)->flush();
        }
    }

    /**
     * Clear section cache.
     *
     * @param string $section Section parameter.
     *
     * @return void
     */
    protected function clearCacheSections($section)
    {
        if ($this->useCache === true) {
            Cache::section($section)->flush();
        }
    }
}
