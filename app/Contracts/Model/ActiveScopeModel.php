<?php
namespace MailMarketing\Contracts\Model;

trait ActiveScopeModel
{

    protected $activeField;

    /**
     * Scope a query to only include active rows.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->activeField, '=', 1);
    }

    /**
     * Scope a query to only include non-active rows.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotActive($query)
    {
        return $query->where($this->activeField, '=', 0);
    }

    /**
     * Get model activation status.
     *
     * @return boolean
     */
    public function isActivated()
    {
        return (boolean)$this->activeField;
    }
}
