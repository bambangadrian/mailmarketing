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
        return $query->where($this->activeField, '=', 'Y');
    }

    /**
     * Scope a query to only include non-active rows.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotActive($query)
    {
        return $query->where($this->activeField, '=', 'N');
    }
}
