<?php

class Inhumado extends Eloquent {
	protected $table = 'inhumado';
	public $timestamps = false;

	public function persona() {
		return $this->belongsTo('Persona');
	}

	public function ventainhumacion() {
		return $this->hasMany('VentaInhumacion');
	}

	public function ventaexhumacion() {
		return $this->hasMany('VentaExhumacion');
	}
}