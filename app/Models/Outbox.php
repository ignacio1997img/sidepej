<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    use HasFactory;


    protected $connection = 'siscor_v2';
    protected $table = 'entradas';

    protected $fillable = [
        'gestion', 'tipo', 'remitente', 'cite', 'referencia', 'nro_hojas', 'funcionario_id_remitente','deadline', 
        'unidad_id_remitente', 'direccion_id_remitente', 'funcionario_id_destino', 'funcionario_id_responsable', 
        'registrado_por', 'registrado_por_id_direccion', 'registrado_por_id_unidad', 'actualizado_por', 
        'fecha_actualizacion','fecha_registro','observacion_rechazo', 'detalles', 'entity_id', 'estado_id', 'tipo_id','details',
        'urgent','category_id',

        'people_id_de', 'job_de', 'people_id_para', 'job_para', 'personeria'
    ];


    public function inbox(){
        return $this->hasMany(Inbox::class, 'entrada_id');
    }


    function entity(){
        return $this->belongsTo(Entity::class, 'entity_id');
    }

    function estado(){
        return $this->belongsTo(Estado::class, 'estado_id');
    }
    
    function archivos(){
        return $this->hasMany(Archivo::class, 'entrada_id');
    }
}
