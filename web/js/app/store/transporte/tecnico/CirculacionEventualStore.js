
Ext.define('CDT.store.transporte.tecnico.CirculacionEventualStore', {
    extend: 'Ext.data.Store',

    fields: [ 'id', 'fecha_inicial', 'fecha_final', 'hora_inicial', 'hora_final', 'aprobado' , 'pendiente', 'tarea', 'circulacion_eventual_tipo', 'chofer_vehiculo_id', 'matricula_id', 'chapa', 'tipo_vehiculo', 'marca', 'modelo', 'chofer', 'licencia', 'unidad_organizativa'],
    autoLoad: true,
    sorters: 'fecha_final',
    groupField: 'chapa',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/circulacion/eventual/circulacion_eventual/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});