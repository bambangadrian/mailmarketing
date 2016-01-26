<?php
namespace MailMarketing\Models;

use \DB;
use Illuminate\Database\Eloquent\Model;
use MailMarketing\Contracts\Model\DeletedScopeModel;
use MailMarketing\Contracts\Model\ActiveScopeModel;
use MailMarketing\Observers\BasicModelObserver;

abstract class AbstractBaseModel extends Model
{

    use DeletedScopeModel;

    /**
     * The column prefix name of each table.
     *
     * @var string $columnPrefix
     */
    protected $columnPrefix;

    /**
     * Class constructor
     *
     * @param array $attributes Attribute parameter.
     */
    public function __construct(array $attributes = [])
    {
        $this->table = (new \ReflectionClass($this))->getShortName();
        $columnPrefix = '';
        if ($this->table === 'TablePrefix') {
            $columnPrefix = 'Tpx';
        } else {
            $prefix = \DB::table('TablePrefix')->where('Tpx_TableName', \DB::getTablePrefix().$this->table)->first();
            if ($prefix !== null or $prefix !== '') {
                $columnPrefix = $prefix->Tpx_Prefix;
            }
        }
        $this->columnPrefix = $columnPrefix;
        $this->primaryKey = $this->columnPrefix.'_ID';
        $this->deleteField = $this->columnPrefix.'_DeletedOn';
        $this->timestamps = false;
        if (in_array(ActiveScopeModel::class, class_uses($this), false) === true) {
            $this->createProperty('activeField', $this->columnPrefix.'_Active');
            $this->fillable(array_merge($this->fillable, [$this->{'activeField'}]));
        }
        $guardArray = array_map(
            function ($val) use ($columnPrefix) {
                return $columnPrefix.'_'.$val;
            },
            ['CreatedOn', 'CreatedBy', 'ModifiedOn', 'ModifiedBy', 'DeletedOn', 'DeletedBy', 'GUID']
        );
        $this->guard($guardArray);
        parent::__construct($attributes);
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::observe(new BasicModelObserver());
    }

    /**
     * Get model column prefix name.
     *
     * @return string
     */
    public function getColumnPrefix()
    {
        return $this->columnPrefix;
    }

    /**
     * Create dynamic class property.
     *
     * @param string $propertyName  Property name parameter.
     * @param mixed  $propertyValue Property value parameter.
     *
     * @return void
     */
    protected function createProperty($propertyName, $propertyValue)
    {
        $this->{$propertyName} = $propertyValue;
    }

    /**
     * Perform the actual delete query on this model instance.
     *
     * @return void
     */
    protected function performDeleteOnModel()
    {
        # Run the save method so the observer can update the delete field column.
        $this->save();
    }
}
