<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class Company extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'Cpy_Name',
        'Cpy_Email',
        'Cpy_WebsiteUrl',
        'Cpy_Address1',
        'Cpy_Address2',
        'Cpy_City',
        'Cpy_PostCode',
        'Cpy_Country',
        'Cpy_TimeZone'
    ];
}
