<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class DssCriteria extends AbstractBaseModel
{

	use ActiveScopeModel;

	/**
	 * Fillable field using for mass assignment.
	 *
	 * @var array $fillable
	 */
	protected $fillable = ['Dcr_DssID', 'Dcr_Name', 'Dcr_Description', 'Dcr_EigenVector', 'Dcr_MatrixTotal'];

	/**
	 * Dss master relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function dss()
	{
		return $this->belongsTo('MailMarketing\Models\Dss', 'Dcr_DssID');
	}

	/**
	 * Dss criteria comparison details relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function details()
	{
		return $this->hasMany('MailMarketing\Models\DssCriteriaDetail', 'Dcd_CriteriaID');
	}

	/**
	 * Dss criteria comparison details relationship.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function compares()
	{
		return $this->details();
	}
}
