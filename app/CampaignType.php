<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignType extends Model
{

    /**
     * Indicates if the model should not be timestamped.
     *
     * @var boolean $timestamps
     */
    public $timestamps = false;

    /**
     * Table name property.
     *
     * @var string $table
     */
    protected $table = 'CampaignType';
}
