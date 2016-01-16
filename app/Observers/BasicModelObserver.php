<?php
namespace MailMarketing\Observers;

use \MailMarketing\Models\AbstractBaseModel;
use \Uuid;

class BasicModelObserver extends AbstractModelObserver
{

    /**
     * Observe creating action.
     *
     * @param AbstractBaseModel $model Model object parameter.
     *
     * @return void
     */
    public function creating(AbstractBaseModel $model)
    {
        $model->{$model->getColumnPrefix() . '_' . 'CreatedOn'} = \Carbon\Carbon::now();
        $model->{$model->getColumnPrefix() . '_' . 'CreatedBy'} = $this->userId;
        $model->{$model->getColumnPrefix() . '_' . 'GUID'} = $this->generateGuid();
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
        // Store a piece of data in the session...
        session()->flash('status', 'success');
        session()->flash('message', 'Data successfully created');
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
        $model->{$model->getColumnPrefix() . '_' . 'ModifiedOn'} = \Carbon\Carbon::now();
        $model->{$model->getColumnPrefix() . '_' . 'ModifiedBy'} = $this->userId;
        $model->{$model->getColumnPrefix() . '_' . 'GUID'} = $this->generateGuid();
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
        // Store a piece of data in the session...
        session()->flash('status', 'success');
        session()->flash('message', 'Data #' . $model->getKey() . ' successfully updated');
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
        $model->{$model->getColumnPrefix() . '_' . 'DeletedOn'} = \Carbon\Carbon::now();
        $model->{$model->getColumnPrefix() . '_' . 'DeletedBy'} = $this->userId;
        $model->{$model->getColumnPrefix() . '_' . 'GUID'} = $this->generateGuid();
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
        // Store a piece of data in the session...
        session()->flash('status', 'success');
        session()->flash('message', 'Data #' . $model->getKey() . ' successfully deleted (softly)');
    }

    /**
     * Generate model GUID value.
     *
     * @return string
     */
    protected function generateGuid()
    {
        return (string)\Uuid::generate(4);
    }
}
