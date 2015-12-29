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
     * Generate model GUID value.
     *
     * @return string
     */
    protected function generateGuid()
    {
        return (string)\Uuid::generate(4);
    }
}
