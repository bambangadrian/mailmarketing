<?php
namespace MailMarketing\Contracts;

trait Crud
{

    /**
     * Allowed form action
     *
     * @var array
     */
    static protected $formMethodSettings = [
        'create' => 'POST',
        'update' => 'PUT',
        'read'   => 'GET',
        'delete' => 'DELETE'
    ];

    /**
     * The data collection that will passed into view.
     *
     * @var array $data
     */
    protected $data = [];

    /**
     * Reference key property.
     *
     * @var string $referenceKey
     */
    protected $referenceKey;

    /**
     * Reference value property
     *
     * @var integer $referenceValue
     */
    protected $referenceValue;

    /**
     * Action property.
     *
     * @var string $action
     */
    protected $action;

    /**
     * Form method property.
     *
     * @var string $formMethod
     */
    protected $formMethod = 'POST';

    /**
     * Create status property.
     *
     * @var boolean $create ;
     */
    protected $create = false;

    /**
     * Read status property.
     *
     * @var boolean $read
     */
    protected $read = false;

    /**
     * Update status property.
     *
     * @var boolean $update
     */
    protected $update = false;

    /**
     * Delete status property.
     *
     * @var boolean $delete
     */
    protected $delete = false;

    /**
     * Enable update flag property.
     *
     * @var boolean $enableUpdate
     */
    protected $enableUpdate = true;

    /**
     * Enable create flag property.
     *
     * @var boolean $enableCreate
     */
    protected $enableCreate = true;

    /**
     * Enable delete flag property.
     *
     * @var boolean $enableDelete
     */
    protected $enableDelete = false;

    /**
     * Get if on create status.
     *
     * @return boolean
     */
    public function isCreate()
    {
        return $this->create;
    }

    /**
     * Set the create status.
     *
     * @param boolean $create Create flag parameter.
     *
     * @return void
     */
    public function setCreate($create = true)
    {
        $this->create = $create;
        $this->setAction('create', $create);
    }

    /**
     * Get if on read status.
     *
     * @return boolean
     */
    public function isRead()
    {
        return $this->read;
    }

    /**
     * Set the read status.
     *
     * @param boolean $read Read flag parameter.
     *
     * @return void
     */
    public function setRead($read = true)
    {
        $this->read = $read;
        $this->setAction('read', $read);
    }

    /**
     * Get if on update status.
     *
     * @return boolean
     */
    public function isUpdate()
    {
        return $this->update;
    }

    /**
     * Set the update status.
     *
     * @param boolean $update Update flag parameter.
     *
     * @return void
     */
    public function setUpdate($update = true)
    {
        $this->update = $update;
        $this->setAction('update', $update);
    }

    /**
     * Get if on delete status.
     *
     * @return boolean
     */
    public function isDelete()
    {
        return $this->delete;
    }

    /**
     * Set the delete status.
     *
     * @param boolean $delete Delete flag parameter.
     *
     * @return void
     */
    public function setDelete($delete = true)
    {
        $this->delete = $delete;
        $this->setAction('delete', $delete);
    }

    /**
     * Get enable update status.
     *
     * @return boolean
     */
    public function isEnableUpdate()
    {
        return $this->enableUpdate;
    }

    /**
     * Set the enable update status.
     *
     * @param boolean $enableUpdate Enable update flag parameter.
     *
     * @return void
     */
    public function setEnableUpdate($enableUpdate)
    {
        $this->enableUpdate = $enableUpdate;
        $this->data['enableUpdate'] = $enableUpdate;
    }

    /**
     * Get enable create status.
     *
     * @return boolean
     */
    public function isEnableCreate()
    {
        return $this->enableCreate;
    }

    /**
     * Set enable create status.
     *
     * @param boolean $enableCreate Enable create flag parameter.
     *
     * @return void
     */
    public function setEnableCreate($enableCreate)
    {
        $this->enableCreate = $enableCreate;
        $this->data['enableCreate'] = $enableCreate;
    }

    /**
     * Get enable delete status.
     *
     * @return boolean
     */
    public function isEnableDelete()
    {
        return $this->enableDelete;
    }

    /**
     * Set enable delete status.
     *
     * @param boolean $enableDelete Enable delete flag parameter.
     *
     * @return void
     */
    public function setEnableDelete($enableDelete)
    {
        $this->enableDelete = $enableDelete;
        $this->data['enableDelete'] = $enableDelete;
    }

    /**
     * Get the form method.
     *
     * @return string
     */
    public function getFormMethod()
    {
        return $this->formMethod;
    }

    /**
     * Get the action property.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set crud action property.
     *
     * @param string  $action The action parameter.
     * @param boolean $state  The action state parameter.
     *
     * @return void
     */
    protected function setAction($action, $state = false)
    {
        $this->data['is'.str_replace(['', '_'], [''], ucwords($action))] = $state;
        if ($state === true) {
            $this->action = $action;
            $this->data['action'] = $action;
            $this->validateFormMethod();
            $this->data['formMethodField'] = $this->getMethodField();
        }
    }

    /**
     * Get method field.
     *
     * @return string
     */
    public function getMethodField()
    {
        return method_field($this->getFormMethod());
    }

    /**
     * Get reference key property.
     *
     * @return string
     */
    public function getReferenceKey()
    {
        return $this->referenceKey;
    }

    /**
     * Set reference key property.
     *
     * @param string $referenceKey Reference key parameter.
     *
     * @return void
     */
    protected function setReferenceKey($referenceKey)
    {
        $this->referenceKey = $referenceKey;
        $this->data['referenceKey'] = $referenceKey;
    }

    /**
     * Get reference value property.
     *
     * @return integer
     */
    public function getReferenceValue()
    {
        $this->referenceValue = \Route::getCurrentRoute()->getParameter($this->getReferenceKey());

        return $this->referenceValue;
    }

    /**
     * Validate and set form method property.
     *
     * @return void
     */
    protected function validateFormMethod()
    {
        if ($this->getAction() !== null and array_key_exists($this->getAction(), static::$formMethodSettings) === true) {
            $this->formMethod = $this->data['formMethod'] = static::$formMethodSettings[$this->getAction()];
        }
    }
}
