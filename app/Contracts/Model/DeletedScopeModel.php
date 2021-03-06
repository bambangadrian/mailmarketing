<?php
namespace MailMarketing\Contracts\Model;

trait DeletedScopeModel
{

    /**
     * Delete field on table.
     *
     * @var string $deleteField
     */
    protected $deleteField;

    /**
     * Scope a query to only include deleted rows.
     *
     * @param $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDeleted($query)
    {
        return $query->whereNotNull($this->deleteField);
    }

    /**
     * Scope a query to only include non-deleted rows.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotDeleted($query)
    {
        return $query->whereNull($this->deleteField);
    }

    /**
     * Check model if has been deleted or not.
     *
     * @return boolean
     */
    public function isDeleted()
    {
        return (boolean)$this->deleteField;
    }
}
